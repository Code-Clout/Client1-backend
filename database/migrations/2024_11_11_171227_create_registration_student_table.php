<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registration_students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->string('home_no')->nullable(); 
            $table->string('mobile')->nullable(); 
            $table->date('DOB')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('father_first_name')->nullable(); 
            $table->string('father_last_name')->nullable();
            $table->string('mother_first_name')->nullable(); 
            $table->string('mother_last_name')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('nationality')->nullable();
            $table->string('street_address')->nullable(); 
            $table->string('city')->nullable(); 
            $table->string('pin_code')->nullable(); 
            $table->text('reason')->nullable();
            $table->string('payment_screenshot')->nullable(); 
            $table->string('transaction_id')->nullable();  
            $table->boolean('agree_to_terms')->default(false); 
            $table->integer('status')->default(1);
            $table->boolean('verify')->default(0); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registration_students');
    }
};
