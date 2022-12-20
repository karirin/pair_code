<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->binary('image');
            $table->integer('age');
            $table->text('occupation');
            $table->text('profile');
            $table->text('address');
            $table->text('skill');
            $table->text('licence');
            $table->text('workhistory');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
            $table->integer('remember_token');
            $table->text('password');
            $table->text('email');
            $table->integer('top_flg');
            $table->integer('match_flg');
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
