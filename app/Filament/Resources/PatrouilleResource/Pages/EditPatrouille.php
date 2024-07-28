<?php

namespace App\Filament\Resources\PatrouilleResource\Pages;

use App\Filament\Resources\PatrouilleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPatrouille extends EditRecord
{
    protected static string $resource = PatrouilleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
