<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use App\Services\FonnteService;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

    protected function afterCreate(): void
    {
        $record = $this->record;

        $message =
"🚀 *ERP SAMUDRA*

📢 *TRANSAKSI BARU*

🏢 Company
{$record->company->company_name}

📂 Category
{$record->category->category_name}

💰 Type
" . strtoupper($record->type) . "

💵 Nominal
Rp " . number_format($record->amount, 0, ',', '.') . "

📄 Status
{$record->status}

📅 Tanggal
{$record->transaction_date}

━━━━━━━━━━━━━━
ERP SAMUDRA";

        FonnteService::send(
            '082297408146',
            $message
        );
    }
}