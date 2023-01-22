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
            $table->string('name');
            $table->bigInteger('role_id')->default('3')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->unique();
            $table->string('profile_img')->default('profil_img.jpg');
            $table->string('nippos')->nullable();
            $table->string('kantor')->nullable();
            $table->bigInteger('divisi_id')->default('1')->unsigned()->nullable();
            $table->foreign('divisi_id')->references('id')->on('divisis')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nmrhp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->date('mulai_bekerja')->nullable();
            $table->string('gaji')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
