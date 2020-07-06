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
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('primer_apellido', 50);
            $table->string('segundo_apellido', 50);
            $table->string('correo_electronico', 125)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 30);
            $table->unsignedInteger('role_id');
            $table->rememberToken();
            $table->timestamps();
            #Foreign Keys
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
            #Opcional si necesito decido borrar la columna
            #$table->dropColumn('role_id');
        });
        Schema::dropIfExists('users');
    }
}
