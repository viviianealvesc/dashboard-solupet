<?php

namespace App\Filament\Resources\AnimaisResource\Pages;

use App\Filament\Resources\AnimaisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnimais extends ListRecords
{
    protected static string $resource = AnimaisResource::class;

    protected static ?string $navigationLabel = 'Animais';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
