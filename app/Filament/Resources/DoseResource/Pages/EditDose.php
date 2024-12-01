<?php

namespace App\Filament\Resources\DoseResource\Pages;

use App\Filament\Resources\DoseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDose extends EditRecord
{
    protected static string $resource = DoseResource::class;
    protected static ?string $navigationLabel = 'Doses';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
