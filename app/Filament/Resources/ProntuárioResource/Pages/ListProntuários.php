<?php

namespace App\Filament\Resources\ProntuárioResource\Pages;

use App\Filament\Resources\ProntuárioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProntuários extends ListRecords
{
    protected static string $resource = ProntuárioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
