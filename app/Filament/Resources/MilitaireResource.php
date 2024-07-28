<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MilitaireResource\Pages;
use App\Filament\Resources\MilitaireResource\RelationManagers;
use App\Models\Militaire;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MilitaireResource extends Resource
{
    protected static ?string $model = Militaire::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')->required(),
                TextInput::make('prenom')->required(),
                TextInput::make('matricule')->unique()->required(),
                TextInput::make('grade')->required(),
                Textarea::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nom'),
                TextColumn::make('prenom'),
                TextColumn::make('matricule'),
                TextColumn::make('grade'),
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
            'index' => Pages\ListMilitaires::route('/'),
            'create' => Pages\CreateMilitaire::route('/create'),
            'edit' => Pages\EditMilitaire::route('/{record}/edit'),
        ];
    }
}
