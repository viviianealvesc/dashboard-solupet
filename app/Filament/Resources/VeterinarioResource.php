<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VeterinarioResource\Pages;
use App\Filament\Resources\VeterinarioResource\RelationManagers;
use App\Models\Veterinario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VeterinarioResource extends Resource
{
    protected static ?string $model = Veterinario::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                ->label('Nome')
                ->placeholder('Digite seu nome')
                ->required(),

                Forms\Components\TextInput::make('crmv')
                ->label('CRMV')
                ->placeholder('CRMV-RJ 67890')
                ->required(),

                Forms\Components\TextInput::make('especialidade')
                ->label('Especialidade')
                ->placeholder('Ex: Médico Cirurgico')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('Código')
                ->searchable(),
                
                Tables\Columns\TextColumn::make('nome')
                ->label('Nome')
                ->searchable(),

                Tables\Columns\TextColumn::make('crmv')
                ->label('Nome')
                ->searchable(),

                Tables\Columns\TextColumn::make('especialidade')
                ->label('Nome')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVeterinarios::route('/'),
            'create' => Pages\CreateVeterinario::route('/create'),
            'edit' => Pages\EditVeterinario::route('/{record}/edit'),
        ];
    }
}
