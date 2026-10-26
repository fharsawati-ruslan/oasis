<?php

namespace App\Filament\Resources\RealizationDocumentResource\Pages;

use App\Filament\Resources\RealizationDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRealizationDocument extends EditRecord
{
    protected static string $resource = RealizationDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
