<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metadata extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'metadata';

    protected $fillable = [
        'image_type',
        'image_path',
        'status',
    ];
}
