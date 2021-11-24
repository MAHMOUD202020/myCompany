<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->string('page' , 50);
            $table->string('name' , 50);
            $table->string('img' , 50);
            $table->string('title_ar' , 100);
            $table->string('title_en' , 100);
            $table->string('text_ar' , 1000)->nullable();
            $table->string('text_en' , 1000)->nullable();
            $table->boolean('is_container',)->default(1);
            $table->boolean('is_active',)->default(1);
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
        Schema::dropIfExists('blocks');
    }
}
