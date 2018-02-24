<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioAllsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_alls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('filter', 100);
            $table->string('images', 100);
            
            $table->string('link', 255);
            $table->timestamps();// For Route
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
        Schema::dropforeign(['portfolio_id']);//ce virno?
        Schem::dropIfExists('portfolio_alls');
    }
}
