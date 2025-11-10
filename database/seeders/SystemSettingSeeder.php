<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemSetting::insert([
            [
                'id'             => 1,
                'system_name'    => 'Blackjack Payment',
                'email'          => 'sales@blackjackpayments.com',
                'copyright_text' => '© 2025 Blackjack Payments. All Rights Reserved.',
                'logo'           => 'backend/assets/images/colored-logo.png',
                'favicon'        => 'backend/assets/images/colored-logo.png',
                'created_at'     => Carbon::now(),
            ],
        ]);
    }
}
