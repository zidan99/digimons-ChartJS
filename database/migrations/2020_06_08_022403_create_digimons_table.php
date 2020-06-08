<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigimonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digimons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('stage', 255);
            $table->string('type', 255);
            $table->string('attribute', 255);
            $table->integer('memory');
            $table->integer('equip_slots');
            $table->integer('lv50_hp');
            $table->integer('lv50_sp');
            $table->integer('lv50_atk');
            $table->integer('lv50_def');
            $table->integer('lv50_int');
            $table->integer('lv50_spd');

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
        Schema::dropIfExists('digimons');
    }
}
