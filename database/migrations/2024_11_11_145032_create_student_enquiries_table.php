<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_student_enquiries_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('student_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact_number');
            $table->string('email_address')->unique();
            $table->string('city');
            $table->string('course_interested');
            $table->text('more_info')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_enquiries');
    }
}
