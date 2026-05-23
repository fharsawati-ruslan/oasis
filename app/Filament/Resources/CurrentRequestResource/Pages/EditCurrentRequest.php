<?php

namespace App\Filament\Resources\CurrentRequestResource\Pages;

use App\Filament\Resources\CurrentRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCurrentRequest extends EditRecord
{
    protected static string $resource = CurrentRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
