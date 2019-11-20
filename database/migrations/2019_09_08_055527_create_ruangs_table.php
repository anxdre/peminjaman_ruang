<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('panjang');
            $table->string('lebar');
            $table->string('kapasitas');
            $table->string('warna');
            $table->integer('harga');
            $table->string('status')->default('tersedia');
            $table->text('desc')->nullable();
            $table->string('gambar');




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
        Schema::dropIfExists('ruangs');
    }
}
