<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_type',
        'amount',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];
}
