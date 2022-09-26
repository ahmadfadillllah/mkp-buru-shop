<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provinsi_id');
            $table->unsignedBigInteger('kota_id');
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('kelurahan_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->string('avatar');
            $table->string('alamat');
            $table->string('nohp');
            $table->string('zipcode');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('provinsi_id')->references('id')->on('indonesia_provinces');
            $table->foreign('kota_id')->references('id')->on('indonesia_cities');
            $table->foreign('kecamatan_id')->references('id')->on('indonesia_districts');
            $table->foreign('kelurahan_id')->references('id')->on('indonesia_villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
