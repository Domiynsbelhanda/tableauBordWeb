<?php

namespace App\Filament\Resources\AlerteResource\Pages;

use App\Filament\Resources\AlerteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlerte extends EditRecord
{
    protected static string $resource = AlerteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
