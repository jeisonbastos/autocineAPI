<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_product', function (Blueprint $table) {
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('product_id');
            $table->decimal('cantidad', 4, 2, true);
            $table->timestamps();
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservation_product', function (Blueprint $table) {
            $table->dropForeign('reservation_product_reservation_id_foreign');
            $table->dropForeign('reservation_product_product_id_foreign');
            #Opcional si necesito decido borrar la columna
            #$table->dropColumn('role_id');
        });
        Schema::dropIfExists('reservation_product');
    }
}
