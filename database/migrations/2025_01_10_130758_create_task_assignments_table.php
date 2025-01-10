<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('task_assignments', function (Blueprint $table) {
            $table->id();
            $table->string('task_title');
            $table->text('task_description');
            $table->unsignedBigInteger('user_id'); // Counsellor ID
            $table->unsignedBigInteger('assigned_by')->nullable(); // Super Admin ID, now nullable
            $table->enum('task_status', ['To do', 'In progress', 'Done'])->default('To do');
            $table->integer('status')->default(1); // Active status
            $table->softDeletes(); // Soft delete
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assigned_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('task_assignments');
    }
}
