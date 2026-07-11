<?php

namespace App\Filament\Pages;

use App\Models\Company;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Pages\Page;

class FinanceReport extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    protected static ?string $navigationGroup = 'Finance';

    protected static ?string $navigationLabel = 'Reporting';

    protected static ?int $navigationSort = 999;

    protected static string $view = 'filament.pages.finance-report';

    public ?int $company_id = 1;

    public string $period = 'daily';

    public ?string $date = null;

    public float $income = 0;

    public float $expense = 0;

    public float $profit = 0;

    public float $cashFlow = 0;

    public $transactions = [];

    public function mount(): void
    {
        $this->date = now()->format('Y-m-d');

        if (! Company::find($this->company_id)) {
            $this->company_id = Company::query()->value('id');
        }

        $this->loadReport();
    }

    public function updated($property): void
    {
        if (
            in_array($property, [
                'company_id',
                'period',
                'date',
            ])
        ) {
            $this->loadReport();
        }
    }

    protected function loadReport(): void
    {
        $query = Transaction::query()
            ->where('company_id', $this->company_id)
            ->where('status', 'approved');

        $date = Carbon::parse($this->date);

        switch ($this->period) {

            case 'monthly':

                $query
                    ->whereMonth('transaction_date', $date->month)
                    ->whereYear('transaction_date', $date->year);

                break;

            case 'yearly':

                $query
                    ->whereYear('transaction_date', $date->year);

                break;

            default:

                $query
                    ->whereDate('transaction_date', $date);

                break;
        }

        $this->income = (clone $query)
            ->where('type', 'income')
            ->sum('amount');

        $this->expense = (clone $query)
            ->where('type', 'expense')
            ->sum('amount');

        $this->profit = $this->income - $this->expense;

        $this->cashFlow = $this->profit;

        $this->transactions = (clone $query)
            ->with([
                'company',
                'category',
            ])
            ->latest('transaction_date')
            ->get();
    }

    protected function getHeaderActions(): array
    {
        return [

            Action::make('exportPdf')
                ->label('Export PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->color('danger')
                ->action(fn () => $this->exportPdf()),

        ];
    }

    public function exportPdf()
    {
        $company = Company::find($this->company_id);

        $pdf = Pdf::loadView(
            'pdf.finance-report',
            [
                'company'      => $company?->company_name,
                'period'       => $this->period,
                'date'         => $this->date,
                'income'       => $this->income,
                'expense'      => $this->expense,
                'profit'       => $this->profit,
                'cashFlow'     => $this->cashFlow,
                'transactions' => collect($this->transactions),
            ]
        );

        return response()->streamDownload(
            fn () => print($pdf->output()),
            'finance-report.pdf'
        );
    }

    public function getCompaniesProperty()
    {
        return Company::orderBy('company_name')->get();
    }
}