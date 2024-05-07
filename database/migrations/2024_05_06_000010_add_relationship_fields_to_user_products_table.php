<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserProductsTable extends Migration
{
    public function up()
    {
        Schema::table('user_products', function (Blueprint $table) {
            $table->unsignedBigInteger('productid_id')->nullable();
            $table->foreign('productid_id', 'productid_fk_9755066')->references('id')->on('products');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_9755067')->references('id')->on('useres');
        });
    }
}
