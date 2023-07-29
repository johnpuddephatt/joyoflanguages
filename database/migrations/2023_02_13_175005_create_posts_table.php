<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create("posts", function (Blueprint $table) {
            $table->id();
            $table->foreignId("author_id")->constrained("users");
            $table->string("image")->nullable();

            $table->string("title", 50);
            $table->string("slug");
            $table->string("introduction", 150)->nullable();
            $table->json("content")->nullable();
            $table->timestamp("published_at")->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("posts");
    }
}
