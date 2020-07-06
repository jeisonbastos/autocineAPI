<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ticket_type_id');
            $table->unsignedInteger('show_id');
            $table->timestamps();
            #foreign keys
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types');
            $table->foreign('show_id')->references('id')->on('shows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_ticket_type_id_foreign');
            $table->dropForeign('tickets_show_id_foreign');
        });
        Schema::dropIfExists('tickets');
    }
}
