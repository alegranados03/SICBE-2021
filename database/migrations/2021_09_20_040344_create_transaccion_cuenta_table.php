<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionCuentaTable extends Migration
{
    protected $connection = 'mysql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion_cuenta', function (Blueprint $table) {
            $table->id('id_trans');
          //  $table->id('id_transaccion');
            $table->integer('id_transaccion');
           // $table->id('id_cuenta');
            $table->integer('id_cuenta');
            $table->float('debe_trans', 8, 2);
            $table->float('haber_trans', 8, 2);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaccion_cuenta');
    }
}
