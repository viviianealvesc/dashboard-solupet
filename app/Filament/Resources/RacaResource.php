<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RacaResource\Pages;
use App\Filament\Resources\RacaResource\RelationManagers;
use App\Models\Especie;
use App\Models\Raca;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RacaResource extends Resource
{
    protected static ?string $model = Raca::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome_raca')
                ->label('Nome da raça')
                ->placeholder('Digite o nome da raça')
                ->required(),

                Forms\Components\Select::make('id_especie')
                ->label('Selecione a especie')
                ->options(
                    Especie::all()->pluck('nome_especie', 'id')->toArray()
                )
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
                
                Tables\Columns\TextColumn::make('nome_raca'),
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
            'index' => Pages\ListRacas::route('/'),
            'create' => Pages\CreateRaca::route('/create'),
            'edit' => Pages\EditRaca::route('/{record}/edit'),
        ];
    }
}
