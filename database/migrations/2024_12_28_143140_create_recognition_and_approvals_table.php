<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecognitionAndApprovalsTable extends Migration
{
    public function up()
    {
        Schema::create('recognition_and_approvals', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->boolean('status')->default(1);
            $table->softDeletes(); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('recognition_and_approvals');
    }
}
