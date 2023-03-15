<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pinjam')->unique();
            $table->bigInteger('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('book_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tglpinjam');
            $table->date('tglkembali');
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
        Schema::dropIfExists('pinjams');
    }
}
