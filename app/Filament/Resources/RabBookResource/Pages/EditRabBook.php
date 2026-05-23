<?php

namespace App\Filament\Resources\RabBookResource\Pages;

use App\Filament\Resources\RabBookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRabBook extends EditRecord
{
    protected static string $resource = RabBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
