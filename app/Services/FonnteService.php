<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FonnteService
{
    public static function send(string $target, string $message)
    {
        return Http::withHeaders([
            'Authorization' => config('services.fonnte.token'),
        ])->asForm()->post(config('services.fonnte.url'), [
            'target'  => $target,
            'message' => $message,
        ]);
    }
}
