<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\ApplyForm;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_apply = ApplyForm::count();
        $total_contact_us = ContactUs::count();
        return view('backend.layouts.index', compact('total_apply', 'total_contact_us'));
    }
}
