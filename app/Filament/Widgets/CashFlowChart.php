<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class CashFlowChart extends ApexChartWidget
{
    protected static ?string $chartId = 'cashFlowChart';

    protected static ?string $heading = 'Cash Flow Analysis';

     protected static ?int $sort = 2;


    protected int|string|array $columnSpan = 'full';

    protected function getOptions(): array
    {
        $year = now()->year;

        $income = Transaction::query()
            ->selectRaw('MONTH(transaction_date) as month, SUM(amount) as total')
            ->where('type', 'income')
            ->where('status', 'approved')
            ->whereYear('transaction_date', $year)
            ->groupBy(DB::raw('MONTH(transaction_date)'))
            ->pluck('total', 'month')
            ->toArray();

        $expense = Transaction::query()
            ->selectRaw('MONTH(transaction_date) as month, SUM(amount) as total')
            ->where('type', 'expense')
            ->where('status', 'approved')
            ->whereYear('transaction_date', $year)
            ->groupBy(DB::raw('MONTH(transaction_date)'))
            ->pluck('total', 'month')
            ->toArray();

        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
        ];

        $incomeData = [];
        $expenseData = [];
        $profitData = [];

        for ($i = 1; $i <= 12; $i++) {
            $incomeValue = (float) ($income[$i] ?? 0);
            $expenseValue = (float) ($expense[$i] ?? 0);

            $incomeData[] = $incomeValue;
            $expenseData[] = $expenseValue;
            $profitData[] = $incomeValue - $expenseValue;
        }

        return [
            'chart' => [
                'type' => 'area',
                'height' => 350,
                'toolbar' => [
                    'show' => true,
                ],
            ],

            'series' => [
                [
                    'name' => 'Income',
                    'data' => $incomeData,
                ],
                [
                    'name' => 'Expense',
                    'data' => $expenseData,
                ],
                [
                    'name' => 'Profit',
                    'data' => $profitData,
                ],
            ],

            'xaxis' => [
                'categories' => $months,
            ],

            'colors' => [
                '#22c55e', // green
                '#ef4444', // red
                '#3b82f6', // blue
            ],

            'stroke' => [
                'curve' => 'smooth',
                'width' => 3,
            ],

            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shadeIntensity' => 1,
                    'opacityFrom' => 0.35,
                    'opacityTo' => 0.05,
                ],
            ],

            'dataLabels' => [
                'enabled' => false,
            ],

            'legend' => [
                'position' => 'top',
            ],

            'tooltip' => [
                'y' => [
                    'formatter' => 'function(val) { return "Rp " + val.toLocaleString(); }',
                ],
            ],
        ];
    }
}
