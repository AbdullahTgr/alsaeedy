<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clicks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_or_vid')->nullable();
            $table->text('ref_id')->nullable();
            $table->text('prop1')->nullable();
            $table->text('prop2')->nullable();
            $table->text('prop3')->nullable();
            $table->text('prop4')->nullable();
            $table->text('prop5')->nullable();
            $table->text('prop6')->nullable();
            $table->text('prop7')->nullable();
            $table->text('prop8')->nullable();
            $table->text('prop9')->nullable();
            $table->text('prop10')->nullable();
            $table->timestamp('read_at')->nullable();
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
        Schema::dropIfExists('clicks'); 
    }
}
