<?php

namespace App\Http\Controllers\Api;

use App\Models\ContactUs;
use App\Mail\ContactUsMail;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use ApiResponse;
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return $this->error([], $validator->errors(), 422);
        }

        $setting = SystemSetting::first();

        $data = ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        $data = [
            'name' => $data->name,
            'email' => $data->email,
            'message' => $data->message,
        ];

        Mail::to($setting->email ?? "sales@blackjackpayments.com")->send(new ContactUsMail($data));

        return $this->success($data, 'Message sent successfully', 201);
    }
}
