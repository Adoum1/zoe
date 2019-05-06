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
            $table->bigIncrements('id');
            $table->integer('role_id')->default(3);
           // $table->integer('site_id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('dateNaissance');
            $table->string('email')->unique();
            $table->string('matricule');
            $table->string('fonction');
            // $table->string('service');
            $table->string('site');
            $table->dateTime('embauche');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->default('default.png');
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
