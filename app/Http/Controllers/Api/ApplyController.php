<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ApplyMail;
use App\Models\ApplyForm;
use App\Models\SystemSetting;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApplyController extends Controller
{
    use ApiResponse;

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email',
            'code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'industry' => 'required|string|max:100',
            'payment_method' => 'required|string|max:100',
            'accept_credit_cards' => 'required|in:yes,no',
            'website' => 'nullable|url|max:255',
            'have_website' => 'required|in:yes,no',
            'country' => 'required|string|max:100',
            'receive_call' => 'required|in:yes,no',
        ]);

        if ($validator->fails()) {
            return $this->error([], $validator->errors(), 422);
        }

        try {
            $setting = SystemSetting::first();
            // dd($setting->logo);

            $data = ApplyForm::create([
                'business_name' => $request->business_name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'code' => $request->code,
                'phone' => $request->phone,
                'industry' => $request->industry,
                'payment_method' => $request->payment_method,
                'accept_credit_cards' => $request->accept_credit_cards,
                'website' => $request->website,
                'have_website' => $request->have_website,
                'country' => $request->country,
                'receive_call' => $request->receive_call,
            ]);

            Mail::to( $setting->email ?? 'sales@blackjackpayments.com')->send(new ApplyMail($data, $setting));

            return $this->success($data, 'Apply form created successfully', 200);
        } catch (\Exception $e) {
            return $this->error([], $e->getMessage(), 500);
        }
    }
}
