<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->id();                     
            $table->unsignedBigInteger('activity_id'); 
            $table->string('image_url');       
            $table->text('description')->nullable();  
            $table->timestamps();               
            $table->softDeletes();              

            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity');
    }
};
