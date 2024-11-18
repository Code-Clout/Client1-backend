<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacedStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('placed_students', function (Blueprint $table) {
            $table->id();
            $table->string('student_photo');
            $table->string('student_name');
            $table->string('company_logo');
            $table->boolean('status')->default(1);
            $table->softDeletes(); // Adds 'deleted_at' column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('placed_students');
    }
}
