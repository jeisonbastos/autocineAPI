<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 75);
            $table->string('descripcion', 250);
            $table->unsignedInteger('product_type_id');
            $table->decimal('tamano_presentacion');
            $table->decimal('precio');
            $table->string('imagenURL');
            $table->timestamps();
            #foreign keys
            $table->foreign('product_type_id')->references('id')->on('product_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_product_type_id_foreign');
        });
        Schema::dropIfExists('products');
    }
}
