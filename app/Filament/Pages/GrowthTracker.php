<?php

namespace App\Filament\Pages;

use App\Models\PlantProgress;
use Filament\Pages\Page;

class GrowthTracker extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Growth Tracker';

    protected static ?string $navigationGroup = 'Plant Monitoring';

    protected static string $view = 'filament.pages.growth-tracker';

    public function getViewData(): array
    {
        return [
            'plants' => PlantProgress::with('details')->get(),
        ];
    }
}