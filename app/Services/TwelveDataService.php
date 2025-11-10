<?php

namespace App\Services;

use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Http;

class TwelveDataService
{
    use ApiResponse;

    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.twelvedata.base_url');
        $this->apiKey  = config('services.twelvedata.api_key');
    }

    /** --------------------------------------------------------------
     *  Get real-time price (single value)
     *  -------------------------------------------------------------- */
    public function getRealTimePrice(string $symbol): ?array
    {
        $response = Http::get("{$this->baseUrl}/price", [
            'symbol' => $symbol,
            'apikey' => $this->apiKey,
        ]);

        return $response->successful() ? $response->json() : null;
    }

    /** --------------------------------------------------------------
     *  Get 24 h price change %
     *  – we request two points: now & 24 h ago
     *  -------------------------------------------------------------- */
    public function get10minuteChange(string $symbol): ?float
    {
        $response = Http::get("{$this->baseUrl}/time_series", [
            'symbol'     => $symbol,
            'interval'   => '1min',
            'outputsize' => 11,               // 10 minutes ago + current
            'apikey'     => $this->apiKey,
        ]);

        if (!$response->successful()) {
            return null;
        }

        $values = $response->json('values') ?? [];
        if (count($values) < 11) {
            return null;
        }

        $current = (float) ($values[0]['close'] ?? 0);
        $tenMinAgo = (float) ($values[10]['close'] ?? 0);

        if ($tenMinAgo == 0) {
            return null;
        }

        $changePct = (($current - $tenMinAgo) / $tenMinAgo) * 100;

        return round($changePct, 2);
    }
}
