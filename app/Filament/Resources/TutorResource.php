<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TutorResource\Pages;
use App\Filament\Resources\TutorResource\RelationManagers;
use App\Models\Tutor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TutorResource extends Resource
{
    protected static ?string $model = Tutor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                ->label('Nome completo')
                ->placeholder('Digite seu nome completo')
                ->required(),

                Forms\Components\TextInput::make('cpf')
                ->label('CPF')
                ->placeholder('999.999.999-99')
                ->mask('999.999.999-99')
                ->required(),

                Forms\Components\TextInput::make('endereco')
                ->label('Endereço')
                ->placeholder('Manuel de alcantara, 67')
                ->required(),

                Forms\Components\TextInput::make('telefone')
                ->label('Telefone')
                ->placeholder('(99) 99999-9999')
                ->mask('(99) 99999-9999')
                ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->placeholder('Digite seu email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->required()
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
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
                ->searchable(),

                Tables\Columns\TextColumn::make('telefone'),
                Tables\Columns\TextColumn::make('cpf')
                ->searchable(),

                Tables\Columns\TextColumn::make('endereco'),
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
            'index' => Pages\ListTutors::route('/'),
            'create' => Pages\CreateTutor::route('/create'),
            'edit' => Pages\EditTutor::route('/{record}/edit'),
        ];
    }
}
