<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->longText('gallery')->nullable()->after('img');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->longText('gallery')->nullable()->after('img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('gallery');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('gallery');
        });
    }
};
