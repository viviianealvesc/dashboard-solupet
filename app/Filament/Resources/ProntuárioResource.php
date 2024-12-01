<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProntuárioResource\Pages;
use App\Filament\Resources\ProntuárioResource\RelationManagers;
use App\Models\Animal;
use App\Models\Prontuario;
use App\Models\Prontuário;
use App\Models\Veterinario;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProntuárioResource extends Resource
{
    protected static ?string $model = Prontuario::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('data_prontuario')
                ->native(false),

                Forms\Components\TextInput::make('diagnostico')
                ->label('Diagnóstico')
                ->required(),

                Forms\Components\TextInput::make('motivoConsulta')
                ->label('Motivo da consulta')
                ->required(),

                Forms\Components\TextInput::make('sinaisClinicos')
                ->label('Sinais clínicos')
                ->required(),

                Forms\Components\TextInput::make('prescricao')
                ->label('Prescrição')
                ->required(),

                Forms\Components\TextInput::make('procedimentosRealizados')
                ->label('Procedimentos realizados')
                ->required(),

                Forms\Components\TextInput::make('observacoes')
                ->label('Observações')
                ->required(),

                Forms\Components\Select::make('id_animal')
                ->label('Nome do animal')
                ->options(
                    Animal::all()->pluck('nome', 'id')->toArray()
                )
                ->required(),

                Forms\Components\Select::make('id_veterinario')
                ->label('Selecione Médico veterinário')
                ->options(
                    Veterinario::all()->pluck('nome', 'id')->toArray()
                )
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('animal.nome')
                ->label('Nome do Animal')
                ->searchable(),

                Tables\Columns\TextColumn::make('diagnostico')
                ->label('Diagnostico')
                ->searchable(),
                
                Tables\Columns\TextColumn::make('motivoConsulta')
                ->label('Motivo da Consulta')
                ->searchable(),

                Tables\Columns\TextColumn::make('sinaisClinicos')
                ->label('Sinais Clínicos')
                ->searchable(),

                Tables\Columns\TextColumn::make('prescricao')
                ->label('Prescrição')
                ->searchable(),

                Tables\Columns\TextColumn::make('procedimentosRealizados')
                ->label('Procedimentos Realizados')
                ->searchable(),

                Tables\Columns\TextColumn::make('observacoes')
                ->label('Observações')
                ->searchable(),

                Tables\Columns\TextColumn::make('data_prontuario')
                ->date('d/m/Y')
                ->searchable(),

                Tables\Columns\TextColumn::make('veterinario.nome')
                ->label('Veterinário')
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
            'index' => Pages\ListProntuários::route('/'),
            'create' => Pages\CreateProntuário::route('/create'),
            'edit' => Pages\EditProntuário::route('/{record}/edit'),
        ];
    }
}
