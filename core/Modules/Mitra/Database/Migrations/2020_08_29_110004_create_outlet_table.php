<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bisnis_id')->unsigned();
            $table->tinyInteger('is_utama')->nullable();
            $table->char('kelurahan_id', 13);
            $table->text('alamat');
            $table->char('kdpos', 10);
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->timestamps();

            $table->foreign('kelurahan_id')->references('id')->on('reg_villages')->onDelete('cascade');
            $table->foreign('bisnis_id')->references('id')->on('bisnis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outlet');
    }
}
