<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_articles', function (Blueprint $table) {
            $table->increments('id');

            $table->string('variant_id');

            $table->string('name');
            $table->string('retail_price');

            $table->string('front');
            $table->string('back');
            $table->string('preview');

            $table->boolean('remove_labels')->default(false);

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
        Schema::drop('shop_articles');
    }
}
