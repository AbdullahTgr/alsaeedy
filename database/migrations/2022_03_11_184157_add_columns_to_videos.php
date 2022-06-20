<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
          
            $table->string('title-ar')->nullable();

            $table->text('summary-ar')->nullable();

            $table->longText('description-ar')->nullable();

            $table->text('quote-ar')->nullable();
          
            $table->string('title-fr')->nullable();

            $table->text('summary-fr')->nullable();

            $table->longText('description-fr')->nullable();

            $table->text('quote-fr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            //
        });
    }
}
