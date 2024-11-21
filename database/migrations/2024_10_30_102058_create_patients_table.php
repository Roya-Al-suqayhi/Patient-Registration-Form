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
            $table->string('hospital_name'); //options? enum?
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('identification_type');
            $table->string('identification_number')->unique(); //integer?
            $table->string('phone_number');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->integer('age')->nullable();
            $table->string('relation'); //options?
            $table->string('active')->nullable(); //or not active? default(false)
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
