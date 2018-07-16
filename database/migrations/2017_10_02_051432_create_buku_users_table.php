<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim');
            $table->foreign('nim')->references('nim')->on('users')->onDelete('cascade');
            $table->string('isbn');
            $table->foreign('isbn')->references('isbn')->on('bukus')->onDelete('cascade');
            $table->string('status', 20);
            $table->timestamp('batas')->nullable();
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
        Schema::dropIfExists('buku_user');
    }
}
