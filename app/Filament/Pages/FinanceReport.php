<?php

namespace App\Filament\Pages;

use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Pages\Page;

class FinanceReport extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    protected static ?string $navigationGroup = 'Finance';

    protected static ?string $navigationLabel = 'Reporting';

    protected static ?int $navigationSort = 999;

    protected static string $view = 'filament.pages.finance-report';

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
        $pdf = Pdf::loadView(
            'pdf.finance-report',
            [
                'company' => 'PT Samudra Nusantara Eich',
                'income' => 50000000,
                'expense' => 12000000,
                'profit' => 38000000,
                'transactions' => collect([
                    (object) [
                        'transaction_date' => now()->format('d/m/Y'),
                        'description' => 'Pembayaran Sales',
                        'amount' => 50000000,
                    ],
                ]),
            ]
        );

        return response()->streamDownload(
            fn () => print($pdf->output()),
            'finance-report.pdf'
        );
    }
}