<?php

namespace App\Filament\Resources\VeterinarioResource\Pages;

use App\Filament\Resources\VeterinarioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVeterinarios extends ListRecords
{
    protected static string $resource = VeterinarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
