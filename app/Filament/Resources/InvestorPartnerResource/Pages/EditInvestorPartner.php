<?php

namespace App\Filament\Resources\InvestorPartnerResource\Pages;

use App\Filament\Resources\InvestorPartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInvestorPartner extends EditRecord
{
    protected static string $resource = InvestorPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
