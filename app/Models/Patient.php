<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_name', 'first_name', 'middle_name', 'last_name', 'identification_type',
        'identification_number', 'phone_number', 'gender', 'date_of_birth', 'age', 'relation'
        ,'active'
    ];

    public function relatives() {
        return $this->hasMany(Relative::class);
    }

    public function insurances() {
        return $this->hasMany(Insurance::class);
    }

}
