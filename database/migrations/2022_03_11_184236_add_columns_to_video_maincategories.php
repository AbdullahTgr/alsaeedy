<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVideoMaincategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_maincategories', function (Blueprint $table) {
            
            $table->string('title-ar')->nullable();
            $table->string('title-fr')->nullable(); 
            $table->unsignedBigInteger('video_maincatroot_id')->nullable();

            $table->foreign('video_maincatroot_id')->references('id')->on('video_maincategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_categories', function (Blueprint $table) {
            //
        });
    }
}
