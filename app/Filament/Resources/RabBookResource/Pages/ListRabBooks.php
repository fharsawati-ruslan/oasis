<?php

namespace App\Filament\Resources\RabBookResource\Pages;

use App\Filament\Resources\RabBookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRabBooks extends ListRecords
{
    protected static string $resource = RabBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
