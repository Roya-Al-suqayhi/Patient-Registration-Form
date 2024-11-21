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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade'); // Foreign key to link to patients
            $table->string('insurance_company');
            $table->string('network')->nullable();
            $table->string('member_policy_number')->nullable();
            $table->string('status')->nullable();
            $table->string('class_type');
            $table->string('name');
            $table->decimal('co_pay', 5, 2); // Decimal for percentage, e.g., 20.00%
            $table->decimal('co_ins', 5, 2)->nullable();
            $table->date('coverage_start_date');
            $table->date('coverage_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
