<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->default(0);
            $table->string('title_ar' , 100);
            $table->string('title_en' , 100);
            $table->string('text_ar' , 1000)->nullable();
            $table->string('text_en' , 1000)->nullable();
            $table->string('icon' , 100)->nullable();
            $table->string('img' , 50)->nullable();
            $table->foreignId('block_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('items');
    }
}
