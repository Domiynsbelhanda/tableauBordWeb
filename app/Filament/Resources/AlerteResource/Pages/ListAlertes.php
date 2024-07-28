<?php

namespace App\Filament\Resources\AlerteResource\Pages;

use App\Filament\Resources\AlerteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlertes extends ListRecords
{
    protected static string $resource = AlerteResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
