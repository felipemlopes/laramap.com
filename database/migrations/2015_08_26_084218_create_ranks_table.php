<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('symbol')->nullable();
            $table->integer('reward')->default(0);

            $table->integer('requirement');
            $table->integer('requirement_type_id');

            $table->timestamps();
        });

        Schema::create('ranks_awarded', function (Blueprint $table) {
            $table->integer('rank_id');

            $table->morphs('rankable');
            $table->timestamp('awarded_at');

            $table->text('revoke_reason')->nullable();
            $table->timestamp('revoked_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('ranks');
        Schema::drop('ranks_awarded');
    }
}
