<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFeesPaymentStructureTable extends Migration
{
    public function up()
    {
        Schema::create('fees_payment_structure', function (Blueprint $table) {
            $table->id();
            $table->string('particular');
            $table->string('without_hostel')->nullable();
            $table->string('with_hostel')->nullable();
            $table->timestamps();
        });

        // Insert default fee data
        DB::table('fees_payment_structure')->insert([
            ['particular' => 'Registration Fees', 'without_hostel' => '50000', 'with_hostel' => '50000', 'created_at' => now(), 'updated_at' => now()],
            ['particular' => 'Program Duration', 'without_hostel' => '4 semesters', 'with_hostel' => '4 semesters', 'created_at' => now(), 'updated_at' => now()],
            ['particular' => 'Tuition Fees 1st Year', 'without_hostel' => '300000', 'with_hostel' => '300000', 'created_at' => now(), 'updated_at' => now()],
            ['particular' => 'Tuition Fees 2nd Year', 'without_hostel' => '300000', 'with_hostel' => '300000', 'created_at' => now(), 'updated_at' => now()],
            ['particular' => 'Hostel+Food 1st Year Fees', 'without_hostel' => null, 'with_hostel' => '120000', 'created_at' => now(), 'updated_at' => now()],
            ['particular' => 'Total Fees', 'without_hostel' => '65000', 'with_hostel' => '770000', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('fees_payment_structure');
    }
}
