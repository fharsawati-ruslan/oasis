<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

    protected function afterCreate(): void
    {
        $record = $this->record;

        $type = $record->type === 'income'
            ? 'Pemasukan'
            : 'Pengeluaran';

        $amount = 'Rp ' . number_format(
            $record->amount,
            0,
            ',',
            '.'
        );

        Notification::make()
            ->success()
            ->title('Transaksi Berhasil! 🎉')
            ->body(
                "{$type} sebesar {$amount} berhasil dicatat."
            )
            ->icon('heroicon-o-check-circle')
            ->duration(5000)
            ->send();
    }
}
