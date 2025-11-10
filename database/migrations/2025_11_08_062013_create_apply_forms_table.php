<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apply_forms', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 100)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('code', 10)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('industry', 100)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->enum('accept_credit_cards', ['yes', 'no'])->default('no');
            $table->string('website', 100)->nullable();
            $table->enum('have_website', ['yes', 'no'])->default('no');
            $table->string('country', 100)->nullable();
            $table->enum('receive_call', ['yes', 'no'])->default('no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_forms');
    }
};
