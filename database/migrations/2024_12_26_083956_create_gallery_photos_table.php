<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryPhotosTable extends Migration
{
    public function up()
    {
        Schema::create('gallery_photos', function (Blueprint $table) {
            $table->id();
            $table->string('gallery_photo');
            $table->boolean('status')->default(1);
            $table->softDeletes(); // Adds 'deleted_at' column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gallery_photos');
    }
}
