<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento', function (Blueprint $table) {
             $table->id();
             $table->foreignId('transaccion_id')->references('id')->on('transaccion');
             $table->foreignId('cuenta_id')->references('id')->on('cuenta');
             $table->decimal('debe', $precision = 8, $scale = 2);
             $table->decimal('haber', $precision = 8, $scale = 2);        
             $table->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento');
    }
}
