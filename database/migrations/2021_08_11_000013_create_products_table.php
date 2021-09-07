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
            $table->id();
            $table->foreignId('id_navegate')->constrained('navegates');
            $table->foreignId('id_material')->constrained('materials');
            $table->foreignId('id_supplier')->constrained('vendors');
            //$table->string('internal_code'); //scan
            $table->string('external_code'); //scan
            $table->integer('quantity');
            $table->foreignId('id_unit_weight')->constrained('weights');
            $table->integer('weight_quantity');
            $table->foreignId('id_umeasurement')->constrained('unit_of_measurements');
            $table->integer('height_measurement');
            $table->integer('width_measurement');
            $table->integer('depth_measurement');
            $table->string('condition');
            $table->string('picture');
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
        Schema::dropIfExists('products');
    }
}
