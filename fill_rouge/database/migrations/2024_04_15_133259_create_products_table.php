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
            $table->string('titre');
            $table->float('prix');
            $table->unsignedBigInteger('id_categorie');
            $table->text('description')->nullable();
            $table->timestamps();

            // Clé étrangère
            $table->foreign('id_categorie')
                ->references('id')->on('categories')
                ->onDelete('cascade'); // Suppression en cascade si la catégorie est supprimée
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
