<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlerteResource\Pages;
use App\Filament\Resources\AlerteResource\RelationManagers;
use App\Models\Alerte;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlerteResource extends Resource
{
    protected static ?string $model = Alerte::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('pseudo'),
                TextInput::make('telephone'),
                TextInput::make('latitude'),
                TextInput::make('longitude'),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending'),
                Select::make('patrouille_id')
                    ->relationship('patrouille', 'nom')
                    ->nullable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pseudo')
                    ->sortable()
                    ->searchable()
                    ->label('Pseudo'),
                TextColumn::make('telephone')
                    ->sortable()
                    ->searchable()
                    ->label('Telephone'),
                TextColumn::make('latitude')
                    ->sortable()
                    ->label('Latitude'),
                TextColumn::make('longitude')
                    ->sortable()
                    ->label('Longitude'),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->formatStateUsing(function ($record) {
                        return match($record->status) {
                            'pending' => '<span class="text-orange-500">Pending</span>',
                            'accepted' => '<span class="text-green-500">Accepted</span>',
                            'rejected' => '<span class="text-red-500">Rejected</span>',
                            default => '<span>' . ucfirst($record->status) . '</span>'
                        };
                    })
                    ->html(),
                TextColumn::make('patrouille.nom')
                    ->label('Assigned Patrouille')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Alert Date'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlertes::route('/'),
            'create' => Pages\CreateAlerte::route('/create'),
            'edit' => Pages\EditAlerte::route('/{record}/edit'),
        ];
    }
}
