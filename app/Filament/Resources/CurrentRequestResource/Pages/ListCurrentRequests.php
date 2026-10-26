<?php

namespace App\Filament\Resources\CurrentRequestResource\Pages;

use App\Filament\Resources\CurrentRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCurrentRequests extends ListRecords
{
    protected static string $resource = CurrentRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
