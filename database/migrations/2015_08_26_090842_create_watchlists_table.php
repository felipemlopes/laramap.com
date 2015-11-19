<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatchlistsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('watchlists', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('author');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('description');
            $table->string('type')->index();
            $table->timestamps();
        });

        Schema::create('watchlist_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('watchlist_id');
            $table->morphs('watchable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('watchlists');
        Schema::drop('watchlist_items');
    }
}
