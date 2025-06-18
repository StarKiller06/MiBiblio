<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LibrosResource\Pages;
use App\Filament\Resources\LibrosResource\RelationManagers;
use App\Models\Libros;
use Doctrine\DBAL\Schema\Column;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Console\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class LibrosResource extends Resource
{
    protected static ?string $model = Libros::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('isbn'),

                Forms\Components\Select::make('autores_id')
                    ->label('Autor')
                    ->Relationship('autores', 'nombre')
                    ->searchable()
                    ->preload()
                    ->optionsLimit(3),

                Forms\Components\Select::make('genero_id')
                    ->label('Genero')
                    ->Relationship('genero', 'nombre_genero')
                    ->searchable()
                    ->preload()
                    ->optionsLimit(3),
                    //->multiple(), el libro perteece a un solo genero por el modelo entidad relacion

                Forms\Components\Select::make('editoriales_id')
                    ->label('Editorial')
                    ->Relationship('editoriales', 'nombre')
                    ->searchable()
                    ->preload()
                    ->optionsLimit(3),

                Forms\Components\DatePicker::make('año_publicacion'),
                    

                FileUpload::make('archivo_pdf') // Cambia 'titulo' por un nombre más descriptivo como 'archivo_pdf'
                    ->acceptedFileTypes(['application/pdf']) // Especifica mejor el tipo MIME
                    ->preserveFilenames()
                    ->label('Archivo PDF del libro')
                    ->required()
                    ->directory('libros-pdfs') // Especifica un directorio para guardar los archivos
                
            ]);
             
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('isbn')
                    ->searchable(),

                Tables\Columns\TextColumn::make('autores.nombre')
                    ->searchable()
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('genero.nombre_genero')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('editoriales.nombre')
                    ->numeric()
                    ->sortable(),
                

                Tables\Columns\TextColumn::make('año_publicacion.date')
                    ->numeric()
                    ->sortable(),

//dudoso
                Tables\Columns\TextColumn::make('archivo_pdf')
                ->label('PDF')
                ->formatStateUsing(function ($state) {
                    return 'Descargar PDF'; // Texto del enlace
                }),
                
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
            'index' => Pages\ListLibros::route('/'),
            'create' => Pages\CreateLibros::route('/create'),
            'edit' => Pages\EditLibros::route('/{record}/edit'),
        ];
    }
}
