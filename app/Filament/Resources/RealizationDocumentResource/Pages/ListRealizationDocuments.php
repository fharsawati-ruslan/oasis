<?php

namespace App\Filament\Resources\RealizationDocumentResource\Pages;

use App\Filament\Resources\RealizationDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRealizationDocuments extends ListRecords
{
    protected static string $resource = RealizationDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
