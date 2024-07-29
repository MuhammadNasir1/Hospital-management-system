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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_husband_name');
            $table->string('disease');
            $table->string('phone');
            $table->string('email');
            $table->string('dob');
            $table->string('cnic');
            $table->string('age');
            $table->string('gender');
            $table->string('material_status');
            $table->string('relation');
            $table->string('city');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
