<?php

namespace App\Filament\Resources\EditorialesResource\Pages;

use App\Filament\Resources\EditorialesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEditoriales extends EditRecord
{
    protected static string $resource = EditorialesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
