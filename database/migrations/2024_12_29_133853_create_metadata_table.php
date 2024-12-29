<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetadataTable extends Migration
{
    public function up()
    {
        Schema::create('metadata', function (Blueprint $table) {
            $table->id();
            $table->enum('image_type', ['Certificates', 'RecruiterCompanies', 'GalleryPhoto']);
            $table->string('image_path');
            $table->boolean('status')->default(1);
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('metadata');
    }
}
