<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnimaisResource\Pages;
use App\Filament\Resources\AnimaisResource\RelationManagers;
use App\Models\Animais;
use App\Models\Animal;
use App\Models\Especie;
use App\Models\Raca;
use App\Models\Tutor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnimaisResource extends Resource
{
    protected static ?string $model = Animal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Animais';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                ->label('Nome')
                ->placeholder('Digite o nome do animalzinho')
                ->required(),

                Forms\Components\TextInput::make('peso')
                ->label('Peso (kg)')
                ->placeholder('Digite o peso em kg')
                ->required(),

                Forms\Components\TextInput::make('altura')
                ->label('Altura (cm)')
                ->placeholder('Digite a altura em cm')
                ->required(),

                Forms\Components\TextInput::make('idade')
                ->label('Idade (anos)')
                ->placeholder('Digite a idade')
                ->required(),

                Forms\Components\Select::make('id_especie')
                ->label('Especie')
                ->options(
                    Especie::all()->pluck('nome_especie', 'id')->toArray()
                )
                ->required(),

                Forms\Components\Select::make('id_raca')
                ->label('Raca')
                ->options(
                    Raca::all()->pluck('nome_raca', 'id')->toArray()
                )
                ->required(),

                Forms\Components\Select::make('id_tutor')
                ->label('Nome do tutor')
                ->options(
                    Tutor::all()->pluck('nome', 'id')->toArray()
                )
                ->required(),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                ->searchable(),
                Tables\Columns\TextColumn::make('raca.nome_raca')
                ->label('Raça')
                ->searchable(),
            
                Tables\Columns\TextColumn::make('especie.nome_especie')
                ->label('Espécie')
                ->searchable(),

                Tables\Columns\TextColumn::make('peso')
                ->label('Peso')
                ->searchable(),

                Tables\Columns\TextColumn::make('altura')
                ->label('Altura')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListAnimais::route('/'),
            'create' => Pages\CreateAnimais::route('/create'),
            'view' => Pages\ViewAnimais::route('/{record}'),
            'edit' => Pages\EditAnimais::route('/{record}/edit'),
        ];
    }
}
