<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductClassificationProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_classification_product', function (Blueprint $table) {
            $table->unsignedInteger('product_classification_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();
            $table->foreign('product_classification_id')->references('id')->on('product_classifications');
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
        Schema::table('product_classification_product', function (Blueprint $table) {
            $table->dropForeign('product_classification_product_product_classification_id_foreign');
            $table->dropForeign('product_classification_product_product_id_foreign');
            #Opcional si necesito decido borrar la columna
            #$table->dropColumn('role_id');
        });
        Schema::dropIfExists('product_classification_product');
    }
}
