<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FonnteService
{
    public static function send(string $target, string $message)
    {
        return Http::withHeaders([
            'Authorization' => env('FONNTE_TOKEN'),
        ])->asForm()->post(env('FONNTE_URL'), [
            'target'  => $target,
            'message' => $message,
        ]);
    }
}