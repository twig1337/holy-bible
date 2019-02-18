<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibleReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bible_references', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('book_number');
            $table->unsignedTinyInteger('chapter');
            $table->unsignedTinyInteger('verse');
            $table->string('book');
            $table->string('reference');
            $table->timestamps();

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
        Schema::dropIfExists('bible_references');
    }
}
