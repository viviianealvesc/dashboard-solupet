<?php

namespace App\Filament\Resources\AnimaisCadastradosResource\Pages;

use App\Filament\Resources\AnimaisCadastradosResource;
use App\Filament\Resources\AnimaisCadastradosResource\Widgets\AnimaisCadastradosResource as WidgetsAnimaisCadastradosResource;
use Filament\Resources\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            WidgetsAnimaisCadastradosResource::class,
        ];
    }
}
