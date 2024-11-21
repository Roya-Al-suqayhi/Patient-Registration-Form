<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    use HasFactory;


    protected $fillable = [
        'patient_id',
        'r_first_name',
        'r_middle_name',
        'r_last_name',
        'r_identification_type',
        'r_identification_number',
        'r_phone_number',
        'r_gender',
        'r_date_of_birth',
        'r_age',
        'r_active'
        ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
}
