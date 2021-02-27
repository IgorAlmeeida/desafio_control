<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('service_id')->nullable(false);
            $table->integer('quantidade')->nullable(false);
            $table->string('nome_func', 500)->nullable(false);
            $table->date('data')->nullable(false);
            $table->time('hora_inicio')->nullable(false);
            $table->time('hora_fim')->nullable(false);
            $table->string('detalhes')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_orders');
    }
}
