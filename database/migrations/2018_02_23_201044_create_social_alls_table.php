<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialAllsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_alls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('link', 255);
            $table->string('callBack', 255);
            $table->timestamps();
            $table->integer('portfolio_id')->nullable()->unsigned();
            $table->foreign('portfolio_id')->references('id')->on('portfolios');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropforeign(['portfolio_id']);
        Schema::dropIfExists('social_alls');
    }
}
