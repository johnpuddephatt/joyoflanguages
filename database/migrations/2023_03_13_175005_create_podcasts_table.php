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
            $table->string("guid");
            $table->string("wp_id")->nullable();
            $table
                ->foreignId("language_id")
                ->nullable()
                ->constrained("languages");
            $table->unsignedInteger("episode_number")->nullable();
            $table->boolean("published")->default(false);
            $table->boolean("synced")->default(false);
            $table->string("title", 300);
            $table->string("file");
            $table->string("duration")->nullable();
            $table->string("slug");
            $table->text("introduction")->nullable();
            $table->json("content")->nullable();
            $table->mediumText("rss_content")->nullable();
            $table->mediumText("wordpress_content")->nullable();
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
