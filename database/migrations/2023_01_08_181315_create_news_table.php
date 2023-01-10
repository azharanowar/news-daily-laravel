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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->tinyInteger('category_id');
            $table->tinyInteger('tags_id');
            $table->tinyInteger('author_id');
            $table->text('short_description')->nullable();
            $table->longText('full_description');
            $table->text('featured_image');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('display_popular')->default(0);
            $table->tinyInteger('display_trending')->default(0);
            $table->tinyInteger('display_breaking')->default(0);
            $table->tinyInteger('comment')->default(1);
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
        Schema::dropIfExists('news');
    }
};
