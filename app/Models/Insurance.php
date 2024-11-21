<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'insurance_company', 
        'network',
        'member_policy_number',
        'status',
        'class_type',
        'name',
        'co_pay',
        'co_ins',
        'coverage_start_date',
        'coverage_end_date',
        'patient_id', 
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}
