<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nim')->unique(); // nim sebagai primary key
            $table->string('name')->index();
            $table->string('slug');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // $table->primary('nim'); // primary custom : nim
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
