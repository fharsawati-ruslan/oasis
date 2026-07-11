<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\InvestorPartner;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InvestorStatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalInvestor = InvestorPartner::count();
        $activeInvestor = InvestorPartner::where('status', 'active')->count();

        $totalCompany = Company::count();

        $income = Transaction::where('type', 'income')->sum('amount');
        $expense = Transaction::where('type', 'expense')->sum('amount');
        $profit = $income - $expense;

        return [

            Stat::make('Total Investor', number_format($totalInvestor))
                ->description($activeInvestor . ' Active Investor')
                ->icon('heroicon-o-user-group')
                ->color('success'),

            Stat::make('Total Companies', number_format($totalCompany))
                ->description('Registered Companies')
                ->icon('heroicon-o-building-office-2')
                ->color('info'),

            Stat::make(
                'Total Income',
                'Rp ' . number_format($income, 0, ',', '.')
            )
                ->description('Total Income Transaction')
                ->icon('heroicon-o-arrow-trending-up')
                ->color('success'),

            Stat::make(
                'Total Expense',
                'Rp ' . number_format($expense, 0, ',', '.')
            )
                ->description('Total Expense Transaction')
                ->icon('heroicon-o-arrow-trending-down')
                ->color('danger'),

            Stat::make(
                'Net Profit',
                'Rp ' . number_format($profit, 0, ',', '.')
            )
                ->description($profit >= 0 ? 'Business is Profitable' : 'Business is in Loss')
                ->icon('heroicon-o-banknotes')
                ->color($profit >= 0 ? 'success' : 'danger'),

        ];
    }
}