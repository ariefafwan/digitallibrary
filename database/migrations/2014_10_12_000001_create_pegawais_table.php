<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('profile_img')->default('profil_img.jpg');
            $table->string('nip')->nullable();
            $table->string('nmrhp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->date('mulai_bekerja')->nullable();
            $table->string('gaji')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
}
