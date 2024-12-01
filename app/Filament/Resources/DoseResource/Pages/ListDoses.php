<?php

namespace App\Filament\Resources\DoseResource\Pages;

use App\Filament\Resources\DoseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDoses extends ListRecords
{
    protected static string $resource = DoseResource::class;
    protected static ?string $navigationLabel = 'Doses';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
