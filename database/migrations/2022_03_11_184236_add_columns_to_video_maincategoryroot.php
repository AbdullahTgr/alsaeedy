<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVideoMaincategoryroot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_maincategoryroot', function (Blueprint $table) {
            
            $table->string('title-ar')->nullable();
            $table->string('title-fr')->nullable(); 
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_maincategoryroot', function (Blueprint $table) {
            //
        });
    }
}
