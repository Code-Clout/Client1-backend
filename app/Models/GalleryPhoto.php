<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryPhoto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gallery_photos';

    protected $fillable = [
        'gallery_photo',
        'status',
    ];
}
