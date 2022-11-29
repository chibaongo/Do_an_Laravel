<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('Username')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Address')->nullable();
            $table->string('FullName')->nullable();
            $table->boolean('IsAdmin')->nullable();
            $table->string('Avatar')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('accounts');
    }
}
