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
        Schema::create('pharmacy_orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('payment_type');
            $table->date('date');
            $table->string('total_amount');
            $table->string('discount');
            $table->string('paid_amount');
            $table->string('change');
            $table->string('grand_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_orders');
    }
};
