<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialPeopleAllsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialpeople_alls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('link', 255);
            $table->string('callBack', 255);
            $table->timestamps();
            
            // For Route
             $table->integer('peopleAll_id')->nullable()->unsigned();
             $table->foreign('peopleAll_id')->references('id')->on('peoples_alls');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropforeign(['peopleAll_id']);//ce virno?
        Schema::dropIfExists('socialpeople_alls');
        
     
    }
}
