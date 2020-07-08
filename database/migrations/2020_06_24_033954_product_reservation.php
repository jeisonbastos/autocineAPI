<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reservation', function (Blueprint $table) {
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('product_id');
            $table->decimal('cantidad');
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
        Schema::table('product_reservation', function (Blueprint $table) {
            $table->dropForeign('product_reservation_reservation_id_foreign');
            $table->dropForeign('product_reservation_product_id_foreign');
            #Opcional si necesito decido borrar la columna
            #$table->dropColumn('role_id');
        });
        Schema::dropIfExists('product_reservation');
    }
}
