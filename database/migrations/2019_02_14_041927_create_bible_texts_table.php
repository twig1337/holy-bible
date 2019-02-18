<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibleTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bible_texts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bible_reference_id')->unsigned();
            $table->string('version');
            $table->text('text');

            $table
                ->foreign('bible_reference_id')
                ->references('id')
                ->on('bible_references');

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bible_texts');
    }
}
