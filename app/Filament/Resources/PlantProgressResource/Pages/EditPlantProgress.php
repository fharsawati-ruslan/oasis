<?php

namespace App\Filament\Resources\PlantProgressResource\Pages;

use App\Filament\Resources\PlantProgressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlantProgress extends EditRecord
{
    protected static string $resource = PlantProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
