<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorPartner extends Model
{
    protected $fillable = [

        // Investor
        'investor_name',
        'partner_name',
        'phone',
        'email',

        // Investment
        'entry_date',
        'investment_amount',
        'profit_sharing',

        // Plantation
        'land_area',
        'address',
        'planting_date',
        'harvest_date',
        'factory_payment_date',

        // Finance
        'destination_account',

        // Status
        'status',

        // Notes
        'notes',

    ];

    protected $casts = [

        'entry_date' => 'date',
        'planting_date' => 'date',
        'harvest_date' => 'date',
        'factory_payment_date' => 'date',

        'investment_amount' => 'decimal:2',
        'profit_sharing' => 'decimal:2',

    ];
}