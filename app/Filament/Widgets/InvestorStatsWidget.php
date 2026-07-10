<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\Investor;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InvestorStatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [

            Stat::make('Total Investor', 15)
                ->description('Registered Investor')
                ->icon('heroicon-o-user-group')
                ->color('success'),
		


            Stat::make('Total Companies', Company::count())
                ->description('Active Companies')
                ->icon('heroicon-o-building-office-2')
                ->color('info'),

            Stat::make(
                'Total Income',
                'Rp ' . number_format(
                    Transaction::where('type', 'income')->sum('amount'),
                    0,
                    ',',
                    '.'
                )
            )
                ->icon('heroicon-o-arrow-trending-up')
                ->color('success'),

            Stat::make(
                'Total Expense',
                'Rp ' . number_format(
                    Transaction::where('type', 'expense')->sum('amount'),
                    0,
                    ',',
                    '.'
                )
            )
                ->icon('heroicon-o-arrow-trending-down')
                ->color('danger'),
        ];
    }
}
