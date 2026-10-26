<?php

namespace App\Filament\Imports;

use App\Models\InvestorPartner;

use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class InvestorPartnerImporter extends Importer
{
    protected static ?string $model = InvestorPartner::class;

    public static function getColumns(): array
    {
        return [

            ImportColumn::make('investor_name'),

            ImportColumn::make('entry_date'),

            ImportColumn::make('investment_amount'),

            ImportColumn::make('partner_name'),

            ImportColumn::make('land_area'),

            ImportColumn::make('address'),

            ImportColumn::make('planting_date'),

            ImportColumn::make('harvest_date'),

            ImportColumn::make('factory_payment_date'),

            ImportColumn::make('profit_sharing'),

            ImportColumn::make('destination_account'),

            ImportColumn::make('notes'),

        ];
    }

    public function resolveRecord(): ?InvestorPartner
    {
        return new InvestorPartner();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Import selesai, ' . number_format($import->successful_rows) . ' data berhasil diimport.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {

            $body .= ' ' . number_format($failedRowsCount) . ' data gagal diimport.';
        }

        return $body;
    }
}