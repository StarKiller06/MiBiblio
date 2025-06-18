<?php

namespace App\Filament\Resources\AutoresResource\Pages;

use App\Filament\Resources\AutoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAutores extends EditRecord
{
    protected static string $resource = AutoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
