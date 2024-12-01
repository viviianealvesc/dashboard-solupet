<?php

namespace App\Filament\Resources\AplicaçãoResource\Pages;

use App\Filament\Resources\AplicaçãoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAplicação extends EditRecord
{
    protected static string $resource = AplicaçãoResource::class;
    protected static ?string $navigationLabel = 'Aplicação';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
