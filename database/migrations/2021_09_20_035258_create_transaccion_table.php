<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_debe', $precision = 8, $scale = 2);
            $table->decimal('total_haber', $precision = 8, $scale = 2);
            $table->string('descripcion',5000);
        });
    }

    /**
     * Reverse the migrations.xa
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaccion');
    }
}
