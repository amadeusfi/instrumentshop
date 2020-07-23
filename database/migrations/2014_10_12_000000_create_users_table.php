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
            $table->integer('is_admin')->default(0);
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();

            $table->date('birth_date')->nullable();
            $table->date('registration_date')->nullable();

            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->integer('plz')->nullable();
            $table->string('country')->nullable();
            $table->integer('phone')->nullable();

            $table->string('email')->unique();
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
