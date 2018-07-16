<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bukus', function (Blueprint $table) {
          // $table->increments('id');
          $table->string('isbn'); // isbn sebagai primary key
          $table->string('judul')->unique();
          $table->string('slug');
          $table->string('pengarang');
          $table->string('penerbit');
          $table->string('halaman');
          $table->integer('stok')->unsigned();
          $table->string('image')->nullable();
          $table->timestamps();
          $table->primary('isbn'); // primary custom : isbn
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
