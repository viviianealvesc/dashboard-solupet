<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AplicaçãoResource\Pages;
use App\Filament\Resources\AplicaçãoResource\RelationManagers;
use App\Models\Animal;
use App\Models\Aplicacao;
use App\Models\Aplicação;
use App\Models\Dose;
use App\Models\Material;
use App\Models\Veterinario;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AplicaçãoResource extends Resource
{
    protected static ?string $model = Aplicacao::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('data_aplicacao')
                ->label('Data da aplicação')
                ->native(false)
                ->required(),

                Forms\Components\TextInput::make('quantidade')
                ->label('Quantidade de doses')
                ->numeric(),

                Forms\Components\TextInput::make('numero_doses')
                ->label('Número de doses')
                ->required(),
                
                Forms\Components\Select::make('id_veterinario')
                ->label('Selecione Médico veterinário')
                ->options(
                    Veterinario::all()->pluck('nome', 'id')->toArray()
                )
                ->required(),

                Forms\Components\Select::make('id_animal')
                ->label('Selecione o animal')
                ->options(
                    Animal::all()->pluck('nome', 'id')->toArray()
                )
                ->required(),

                Forms\Components\Select::make('id_material')
                ->label('Selecione o material')
                ->options(
                    Material::all()->pluck('tipo_material', 'id')->toArray()
                )
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('data_aplicacao')
                ->label('Data da aplicação')
                ->date('d/m/Y')
                ->searchable(),

                Tables\Columns\TextColumn::make('quantidade')
                ->label('Quantidade de doses')
                ->searchable(),

                Tables\Columns\TextColumn::make('numero_doses')
                ->label('Quantidade de doses')
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
            'index' => Pages\ListAplicaçãos::route('/'),
            'create' => Pages\CreateAplicação::route('/create'),
            'edit' => Pages\EditAplicação::route('/{record}/edit'),
        ];
    }
}
