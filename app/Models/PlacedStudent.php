<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlacedStudent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'placed_students';

    protected $fillable = [
        'student_photo',
        'student_name',
        'company_logo',
        'status'
    ];
}
