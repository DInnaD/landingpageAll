<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleAllsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_alls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('position', 150);
            $table->text('text', 255);
            $table->string('images', 100);
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
        Schema::dropIfExists('people_alls');
    }
}
