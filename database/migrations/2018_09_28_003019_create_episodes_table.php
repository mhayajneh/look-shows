<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('episodeID');
            $table->string('title',255)->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('thumbnail')->nullable(false);
            $table->string('video')->nullable(false);
            $table->integer('series_seriesID')->unsigned();
            $table->timestamps();
            $table->foreign('series_seriesID')
                ->references('seriesID')->on('series')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
