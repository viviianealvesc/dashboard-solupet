<?php

namespace App\Filament\Resources\RacaResource\Pages;

use App\Filament\Resources\RacaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRaca extends EditRecord
{
    protected static string $resource = RacaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
