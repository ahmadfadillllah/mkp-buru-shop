<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('kategoriproduk');
            $table->string('namaproduk');
            $table->bigInteger('hargaproduk');
            $table->integer('stokproduk');
            $table->text('deskripsiproduk');
            $table->string('gambarproduk1');
            $table->string('gambarproduk2');
            $table->string('gambarproduk3');
            $table->string('gambarproduk4');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
