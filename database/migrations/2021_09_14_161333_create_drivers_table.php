<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('nameDriver');
            $table->string('nationality');
            $table->string('driver_foto');
            $table->integer('nb_championship');
            $table->integer('nb_victory');
            $table->integer('nb_pole');
            $table->integer('nb_fasted_lap');
            $table->integer('nb_podium');
            $table->integer('nb_turns_front');
            $table->integer('nb_km_front');
            $table->integer('nb_gp');
            $table->integer('nb_season');
            $table->decimal('nb_total_points',8,1);
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
        Schema::dropIfExists('drivers');
    }
}
