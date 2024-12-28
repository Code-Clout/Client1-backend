<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->enum('package_type', ['highest', 'average', 'minimum'])->unique();
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->timestamps();
        });

        DB::table('packages')->insert([
            ['package_type' => 'highest', 'amount' => 0.00, 'created_at' => now(), 'updated_at' => now()],
            ['package_type' => 'average', 'amount' => 0.00, 'created_at' => now(), 'updated_at' => now()],
            ['package_type' => 'minimum', 'amount' => 0.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
