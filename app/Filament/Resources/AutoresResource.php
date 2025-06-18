<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AutoresResource\Pages;
use App\Filament\Resources\AutoresResource\RelationManagers;
use App\Models\Autores;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AutoresResource extends Resource
{
    protected static ?string $model = Autores::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('apellido1')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('apellido2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('pais_origen')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pais_origen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAutores::route('/'),
            'create' => Pages\CreateAutores::route('/create'),
            'edit' => Pages\EditAutores::route('/{record}/edit'),
        ];
    }
}
