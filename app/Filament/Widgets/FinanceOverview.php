<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FinanceOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $stats = [];

        $companies = Company::all();

        foreach ($companies as $company) {

            $income = Transaction::where('company_id', $company->id)
                ->where('type', 'income')
                ->sum('amount');

            $expense = Transaction::where('company_id', $company->id)
                ->where('type', 'expense')
                ->sum('amount');

            $stats[] = Stat::make(
                $company->company_name,
                'Income: Rp ' . number_format($income, 0, ',', '.')
            )
            ->description(
                'Expense: Rp ' . number_format($expense, 0, ',', '.')
            );
        }

        return $stats;
    }
}