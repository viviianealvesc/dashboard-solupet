<?php

namespace App\Filament\Resources\AnimaisResource\Pages;

use App\Filament\Resources\AnimaisResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAnimais extends ViewRecord
{
    protected static string $resource = AnimaisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
