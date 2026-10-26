<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\Transaction;
use Filament\Widgets\ChartWidget;

class FinanceChart extends ChartWidget
{
    protected static ?string $heading = 'Income vs Expense per Company';

    protected function getData(): array
    {
        $labels = [];
        $incomeData = [];
        $expenseData = [];

        foreach (Company::all() as $company) {

            $labels[] = $company->company_name;

            $incomeData[] = Transaction::where('company_id', $company->id)
                ->where('type', 'income')
                ->sum('amount');

            $expenseData[] = Transaction::where('company_id', $company->id)
                ->where('type', 'expense')
                ->sum('amount');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Income',
                    'data' => $incomeData,
                    'backgroundColor' => '#22c55e',
                ],
                [
                    'label' => 'Expense',
                    'data' => $expenseData,
                    'backgroundColor' => '#ef4444',
                ],
            ],

            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}