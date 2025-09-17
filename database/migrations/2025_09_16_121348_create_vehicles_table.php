<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('model'); // modelo do veículo
            $table->string('plate'); // placa
            $table->date('acquisition_date'); // data de aquisição
            $table->string('accessibility_type')->nullable(); // tipo de acessibilidade (se houver)
            $table->timestamps();
            $table->softDeletes(); // opcional: para exclusão suave
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}