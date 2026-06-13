<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class FinanceReport extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    protected static ?string $navigationGroup = 'Finance';

    protected static ?string $navigationLabel = 'Reporting';

    protected static ?int $navigationSort = 999;

    protected static string $view = 'filament.pages.finance-report';
}