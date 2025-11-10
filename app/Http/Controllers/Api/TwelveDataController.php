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

    public function getPrice(Request $request)
    {
        $symbol = $request->query('symbol', 'AAPL');

        $data = $this->twelveData->getRealTimePrice($symbol);

         
        // event(new CryptoPriceUpdated($data));
        
        return $this->success($data, 'Real-time stock price', 200);
    }
}
