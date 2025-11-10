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
        $this->apiKey = config('services.twelvedata.api_key');
    }

    // ✅ Get Real-Time Stock Price
    public function getRealTimePrice($symbol)
    {
        $response = Http::get("{$this->baseUrl}/quote", [
            'symbol' => $symbol,
            'apikey' => $this->apiKey,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return $this->error([], 'Failed to get real-time stock price', 422);
    }
}
