<?php

namespace App\Filament\Resources\InvestorPartnerResource\Pages;

use App\Filament\Resources\InvestorPartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInvestorPartners extends ListRecords
{
    protected static string $resource = InvestorPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
