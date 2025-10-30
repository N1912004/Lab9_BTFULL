<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBodyToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
            Schema::table('articles', function (Blueprint $table) {
            if (!Schema::hasColumn('articles', 'body')) {
                $table->text('body')->nullable();
            }
        });
        }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('body');
        });
    }
}
