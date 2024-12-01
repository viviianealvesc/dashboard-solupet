<?php

namespace App\Filament\Resources\AnimaisResource\Pages;

use App\Filament\Resources\AnimaisResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnimais extends EditRecord
{
    protected static string $resource = AnimaisResource::class;
    protected static ?string $navigationLabel = 'Animais';

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
