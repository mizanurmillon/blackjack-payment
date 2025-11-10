<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Events\CryptoPriceUpdated;
use App\Services\TwelveDataService;
use App\Http\Controllers\Controller;

class TwelveDataController extends Controller
{
    use ApiResponse;

    protected $twelveData;

    public function __construct(TwelveDataService $twelveData)
    {
        $this->twelveData = $twelveData;
    }

    /**
     * Get real-time price + 10-minute % change
     */
    public function getPrice(): \Illuminate\Http\JsonResponse
    {
        
        $symbols = ['DOGE/USD', 'BTC/USD', 'ETH/USD', 'SOL/USD'];

        $result = [];

        foreach ($symbols as $symbol) {
            // Current price
            $priceData = $this->twelveData->getRealTimePrice($symbol);
            $price = isset($priceData['price']) ? (float) $priceData['price'] : null;

            // 10-minute % change
            $changePct = $this->twelveData->get10minuteChange($symbol) ?? 0.0;

            // UI-friendly formatting
            $formattedPrice  = $price !== null ? '$' . number_format($price, 0, '.', ',') : null;
            $formattedChange = ($changePct >= 0 ? '+' : '') . number_format($changePct, 2) . '%';
            $changeClass     = $changePct >= 0 ? 'positive' : 'negative';

            $result[] = [
                'symbol'           => $symbol,
                'price'            => $price,
                'formatted_price'  => $formattedPrice,
                'change_10m'       => $changePct,
                'formatted_change' => $formattedChange,
                'change_class'     => $changeClass,
            ];
        }

        return $this->success([
            'data'      => $result,
            'timestamp' => now()->toIso8601String(),
        ], 'All symbols real-time price with 10-minute change', 200);
    }
}
