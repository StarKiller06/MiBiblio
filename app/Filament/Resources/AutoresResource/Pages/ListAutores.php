<?php

namespace App\Filament\Resources\AutoresResource\Pages;

use App\Filament\Resources\AutoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAutores extends ListRecords
{
    protected static string $resource = AutoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
