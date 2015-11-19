<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('quantity');

            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('shop_articles')->onDelete('cascade');

            $table->string('variant_id');

            $table->string('name');
            $table->string('address1');
            $table->string('city');
            $table->string('state_code');
            $table->string('country_code');
            $table->string('zip');

            $table->softDeletes();
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
        Schema::drop('shop_orders');
    }
}
