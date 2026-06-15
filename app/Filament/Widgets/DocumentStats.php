<?php

namespace App\Filament\Widgets;

use App\Models\RealizationDocument;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DocumentStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make(
                'Total Documents',
                RealizationDocument::count()
            )
                ->description('All uploaded documents')
                ->color('primary'),

            Stat::make(
                'Approved',
                RealizationDocument::where('status', 'approved')->count()
            )
                ->description('Approved documents')
                ->color('success'),

            Stat::make(
                'Review',
                RealizationDocument::where('status', 'review')->count()
            )
                ->description('Waiting approval')
                ->color('warning'),

            Stat::make(
                'Draft',
                RealizationDocument::where('status', 'draft')->count()
            )
                ->description('Draft documents')
                ->color('gray'),
        ];
    }
}