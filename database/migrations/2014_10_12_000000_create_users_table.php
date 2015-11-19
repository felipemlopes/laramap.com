<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('github_id')->unique()->nullable();
            $table->string('avatar')->nullable();

            $table->string('email');
            $table->string('password', 60);

            $table->string('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->string('github_profile')->nullable();
            $table->string('twitter_profile')->nullable();

            $table->boolean('hireable')->nullable()->default(0);
            $table->string('website')->nullable();

            $table->boolean('is_admin')->nullable()->default(0);
            $table->boolean('is_partner')->nullable()->default(0);
            $table->boolean('is_sponsor')->nullable()->default(0);
            $table->boolean('is_sitepoint')->nullable()->default(0);

            $table->text('bio')->nullable();

            $table->tinyInteger('skill_laravel')->nullable()->default(0);
            $table->tinyInteger('skill_frontend')->nullable()->default(0);
            $table->tinyInteger('skill_backend')->nullable()->default(0);
            $table->tinyInteger('skill_mobile')->nullable()->default(0);

            $table->json('settings')->nullable();

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
