<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlumniSpeak extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'alumni_speak';

    protected $fillable = [
        'student_photo',
        'description',
        'student_name',
        'company_name',
        'company_logo',
        'status'
    ];
}
