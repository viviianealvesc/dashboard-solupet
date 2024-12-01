<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaterialResource\Pages;
use App\Filament\Resources\MaterialResource\RelationManagers;
use App\Models\Dose;
use App\Models\Material;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                ->label('Nome do material')
                ->placeholder('Ex: Vacina Antirrábica')
                ->required(),

                Forms\Components\TextInput::make('descricao')
                ->label('Descrição do material')
                ->placeholder('Ex: Protege contra o virus da raiva')
                ->required(),

                Forms\Components\TextInput::make('tipo_material')
                ->label('Tipo do material')
                ->placeholder('Ex: Vacina')
                ->required(),
                
                Forms\Components\Select::make('id_dose')
                ->label('Selecione a dose')
                ->options(
                    Dose::all()->pluck('descricao_reduzida', 'id')->toArray()
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
                Tables\Columns\TextColumn::make('descricao'),
                Tables\Columns\TextColumn::make('tipo_material')
                ->searchable(),
                Tables\Columns\TextColumn::make('dose.descricao_reduzida')
                ->searchable()
                ->label('Dose')
                ->sortable(),
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
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
        ];
    }
}
