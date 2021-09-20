<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionTable extends Migration
{
    protected $connection = 'mysql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion', function (Blueprint $table) {
            //$table->id('id_transaccion');
            $table->foreignId('id_transaccion');
            $table->string('tipo_transaccion');
            $table->decimal('monto_transaccion', $precision = 8, $scale = 2);
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
