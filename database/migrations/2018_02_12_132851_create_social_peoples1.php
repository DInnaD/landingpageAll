<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialPeoples1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('socialpeoples1', function (Blueprint $table) {
            // For Route
             $table->integer('people_id')->nullable()->unsigned();
             $table->foreign('people_id')->references('id')->on('peoples1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('pages1');
     Schema::dropforeign(['people_id']);//ce virno?
     Schema::dropIfExists('peoples1');
    }
}
