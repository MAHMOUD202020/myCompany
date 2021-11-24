<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->default(0);
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('img', 50);
            $table->string('cover' , 50);
            $table->string('category_ar', 100);
            $table->string('category_en', 100);
            $table->string('shortDescription_ar' , 150);
            $table->string('shortDescription_en', 150);
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
