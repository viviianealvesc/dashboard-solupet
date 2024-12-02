<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DoseResource\Pages;
use App\Filament\Resources\DoseResource\RelationManagers;
use App\Models\Dose;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DoseResource extends Resource
{
    protected static ?string $model = Dose::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('descricao')
                ->label('Descriçao')
                ->placeholder('Ex: Vacina Antirrábica')
                ->required(),

                Forms\Components\TextInput::make('descricao_reduzida')
                ->label('Descriçao reduzida')
                ->placeholder('Ex: Antirrábica')
                ->required(),

                Forms\Components\TextInput::make('sigla')
                ->label('Sigla')
                ->placeholder('Ex: DU')
                ->required(),

                Forms\Components\TextInput::make('numero_repeticoes')
                ->label('Número de repetições')
                ->placeholder('Ex: 2')
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
                
                Tables\Columns\TextColumn::make('descricao')
                ->searchable(),
                Tables\Columns\TextColumn::make('descricao_reduzida')
                ->searchable(),
                Tables\Columns\TextColumn::make('sigla')
                ->searchable(),
                Tables\Columns\TextColumn::make('numero_repeticoes'),
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
            'index' => Pages\ListDoses::route('/'),
            'create' => Pages\CreateDose::route('/create'),
            'edit' => Pages\EditDose::route('/{record}/edit'),
        ];
    }
}
