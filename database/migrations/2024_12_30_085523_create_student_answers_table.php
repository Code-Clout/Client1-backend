<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('student_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('question_id');
            $table->boolean('is_correct');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('registration_students')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
        Schema::table('registration_students', function (Blueprint $table) {
            $table->integer('score')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_answers');
        Schema::table('registration_students', function (Blueprint $table) {
            $table->dropColumn('score');
        });
    }
}
