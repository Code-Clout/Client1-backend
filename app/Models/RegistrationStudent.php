<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationStudent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name', 'home_no', 'mobile', 'DOB', 'email', 
        'father_first_name', 'father_last_name', 'mother_first_name', 
        'mother_last_name', 'gender', 'nationality', 'street_address', 
        'city', 'pin_code', 'reason', 'agree_to_terms', 'status', 'user_id'
    ];
}
