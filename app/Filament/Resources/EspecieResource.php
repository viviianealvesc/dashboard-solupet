<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EspecieResource\Pages;
use App\Filament\Resources\EspecieResource\RelationManagers;
use App\Models\Especie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EspecieResource extends Resource
{
    protected static ?string $model = Especie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome_especie')
                ->label('Nome da especie')
                ->placeholder('Digite o nome sa especie')
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
                
                Tables\Columns\TextColumn::make('nome_especie')
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
            'index' => Pages\ListEspecies::route('/'),
            'create' => Pages\CreateEspecie::route('/create'),
            'edit' => Pages\EditEspecie::route('/{record}/edit'),
        ];
    }
}
