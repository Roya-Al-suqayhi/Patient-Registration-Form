<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('insurances', function (Blueprint $table) {
            $table->integer('insurance_company')->change(); // Change to integer
            $table->integer('class_type')->change();        // Change to integer
            $table->integer('name')->change();              // Change to integer
        });
    }

    public function down(): void
    {
        Schema::table('insurances', function (Blueprint $table) {
            $table->string('insurance_company', 255)->change();
            $table->string('class_type')->change();
            $table->string('name', 255)->change();
        });
    }
};
