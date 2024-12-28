<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesPaymentStructure extends Model
{
    use HasFactory;

    protected $table = 'fees_payment_structure';

    protected $fillable = [
        'particular',
        'without_hostel',
        'with_hostel',
    ];
}
