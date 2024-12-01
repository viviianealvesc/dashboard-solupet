<?php

namespace App\Filament\Resources\AplicaçãoResource\Pages;

use App\Filament\Resources\AplicaçãoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAplicaçãos extends ListRecords
{
    protected static string $resource = AplicaçãoResource::class;
    protected static ?string $navigationLabel = 'Aplicações';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
