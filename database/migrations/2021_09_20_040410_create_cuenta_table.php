<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaTable extends Migration
{
    protected $connection = 'mysql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta', function (Blueprint $table) {
            $table->id('id_cuenta');
            $table->id('cue_id_cuenta');
            $table->string('nombre_cuenta');
            $table->string('tipo_cuenta');
            $table->float('debe', 8, 2);
            $table->float('haber', 8, 2);
            $table->decimal('correlativo', $precision = 8, $scale = 2);
            $table->decimal('numero_cuenta', $precision = 8, $scale = 2);


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
        Schema::dropIfExists('cuenta');
    }
}
