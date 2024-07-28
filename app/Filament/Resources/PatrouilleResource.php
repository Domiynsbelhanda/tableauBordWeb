<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatrouilleResource\Pages;
use App\Filament\Resources\PatrouilleResource\RelationManagers;
use App\Models\Militaire;
use App\Models\Patrouille;
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

class PatrouilleResource extends Resource
{
    protected static ?string $model = Patrouille::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')->required(),
                Select::make('chef_patrouille_id')
                    ->relationship('chefPatrouille', 'matricule')
                    ->searchable(),
                TextInput::make('matricule')->unique()->required(),
                TextInput::make('password')->password()->required(),
                TextInput::make('plaque_vehicule')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nom'),
                TextColumn::make('chefPatrouille.nom')->label('Chef de Patrouille'),
                TextColumn::make('matricule'),
                TextColumn::make('plaque_vehicule'),
                TextColumn::make('position')->formatStateUsing(function ($record) {
                    return $record->latitude . ', ' . $record->longitude;
                }),
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
            'index' => Pages\ListPatrouilles::route('/'),
            'create' => Pages\CreatePatrouille::route('/create'),
            'edit' => Pages\EditPatrouille::route('/{record}/edit'),
        ];
    }
}
