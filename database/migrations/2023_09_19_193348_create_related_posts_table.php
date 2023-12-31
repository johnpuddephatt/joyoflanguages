<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("related_posts", function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("post_id");
            $table
                ->foreign("post_id")
                ->references("id")
                ->on("posts");
            $table->unsignedBigInteger("related_id");
            $table
                ->foreign("related_id")
                ->references("id")
                ->on("posts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("related_posts");
    }
};
