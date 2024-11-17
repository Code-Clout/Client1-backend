<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('student_testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('student_photo');
            $table->text('description');
            $table->string('student_name');
            $table->string('company_name');
            $table->string('company_logo');
            $table->boolean('status')->default(1);
            $table->softDeletes(); // Adds 'deleted_at' column for soft deletes
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_testimonials');
    }
}
