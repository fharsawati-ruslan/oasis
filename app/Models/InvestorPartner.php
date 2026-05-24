<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorPartner extends Model
{
    protected $fillable = [

        'investor_name',
        'entry_date',
        'investment_amount',

        'partner_name',
        'land_area',
        'address',

        'planting_date',
        'harvest_date',

        'factory_payment_date',

        'profit_sharing',

        'destination_account',

        'notes',

    ];
}