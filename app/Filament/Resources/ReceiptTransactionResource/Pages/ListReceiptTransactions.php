<?php

namespace App\Filament\Resources\ReceiptTransactionResource\Pages;

use App\Filament\Resources\ReceiptTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReceiptTransactions extends ListRecords
{
    protected static string $resource = ReceiptTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
