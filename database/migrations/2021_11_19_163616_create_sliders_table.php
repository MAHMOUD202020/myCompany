<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->default(0);
            $table->string('title_ar' , 100);
            $table->string('title_en' , 100);
            $table->string('img' , 50)->nullable();
            $table->string('background' , 50)->nullable();
            $table->string('text_ar' , 1000)->nullable();
            $table->string('text_en' , 1000)->nullable();
            $table->string('btn_text_ar' , 100)->nullable();
            $table->string('btn_text_en' , 100)->nullable();
            $table->string('url')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sliders');
    }
}
