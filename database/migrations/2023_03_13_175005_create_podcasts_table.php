<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create("podcasts", function (Blueprint $table) {
            $table->id();
            $table
                ->integer("author_id")
                ->unsigned()
                ->nullable();
            $table->unsignedInteger("episode_number");
            $table->string("title", 100);
            $table->string("slug");
            $table->string("introduction", 250)->nullable();
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
        Schema::dropIfExists("podcasts");
    }
}
