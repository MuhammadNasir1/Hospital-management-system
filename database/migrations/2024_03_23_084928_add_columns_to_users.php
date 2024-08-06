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
        Schema::table('users', function (Blueprint $table) {
            $table->text('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('dpt_name')->nullable();
            $table->string('department')->nullable();
            $table->string('block_no')->nullable();
            $table->string('company')->nullable();
            $table->string('company_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('specialization')->nullable();
            $table->string('lisence_no')->nullable();
            $table->string('issuing_authority')->nullable();
            $table->string('exp_date')->nullable();
            $table->string('age')->nullable();
            $table->string('dob')->nullable();
            $table->string('school')->nullable();
            $table->string('graduation')->nullable();
            $table->string('residency')->nullable();
            $table->text('user_image')->nullable();
            $table->string('verification')->default("pending");
            $table->string('tax_number')->nullable();
            $table->string('client_type')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
