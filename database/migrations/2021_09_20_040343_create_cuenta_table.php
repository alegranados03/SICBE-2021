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
            $table->id();
            $table->string('numero_cuenta');
            $table->string('numero_real');
            $table->string('nombre_cuenta');
            $table->foreignId('padre_id')->references('id')->on('cuenta');
            $table->decimal('debe', $precision = 8, $scale = 2);
            $table->decimal('haber', $precision = 8, $scale = 2);
            $table->foreignId('tipo_id')->references('id')->on('tipo_cuenta');
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
