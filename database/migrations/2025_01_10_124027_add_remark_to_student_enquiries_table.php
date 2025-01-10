<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemarkToStudentEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::table('student_enquiries', function (Blueprint $table) {
            $table->text('remark')->nullable()->after('more_info');
        });
    }

    public function down()
    {
        Schema::table('student_enquiries', function (Blueprint $table) {
            $table->dropColumn('remark');
        });
    }
}
