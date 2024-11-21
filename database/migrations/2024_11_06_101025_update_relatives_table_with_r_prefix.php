<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('relatives', function (Blueprint $table) {
        $table->renameColumn('first_name', 'r_first_name');
        $table->renameColumn('middle_name', 'r_middle_name');
        $table->renameColumn('last_name', 'r_last_name');
        $table->renameColumn('identification_type', 'r_identification_type');
        $table->renameColumn('identification_number', 'r_identification_number');
        $table->renameColumn('phone_number', 'r_phone_number');
        $table->renameColumn('gender', 'r_gender');
        $table->renameColumn('date_of_birth', 'r_date_of_birth');
        $table->renameColumn('age', 'r_age');
        $table->renameColumn('active', 'r_active');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('relatives', function (Blueprint $table) {
        $table->renameColumn('r_first_name', 'first_name');
        $table->renameColumn('r_middle_name', 'middle_name');
        $table->renameColumn('r_last_name', 'last_name');
        $table->renameColumn('r_identification_type', 'identification_type');
        $table->renameColumn('r_identification_number', 'identification_number');
        $table->renameColumn('r_phone_number', 'phone_number');
        $table->renameColumn('r_gender', 'gender');
        $table->renameColumn('r_date_of_birth', 'date_of_birth');
        $table->renameColumn('r_age', 'age');
        $table->renameColumn('r_active', 'active');
    });
}
};
