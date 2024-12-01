<?php

namespace App\Filament\Resources\RacaResource\Pages;

use App\Filament\Resources\RacaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRacas extends ListRecords
{
    protected static string $resource = RacaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
