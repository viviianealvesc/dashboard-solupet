<?php

namespace App\Filament\Resources\AplicaçãoResource\Pages;

use App\Filament\Resources\AplicaçãoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAplicação extends CreateRecord
{
    protected static string $resource = AplicaçãoResource::class;
    protected static ?string $navigationLabel = 'Aplicação';
}
