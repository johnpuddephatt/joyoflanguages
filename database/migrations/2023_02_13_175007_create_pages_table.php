<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create("pages", function (Blueprint $table) {
            $table->id();
            $table->string("title", 200);
            $table->string("slug");
            $table
                ->foreignId("language_id")
                ->nullable()
                ->constrained("languages");
            $table->text("introduction")->nullable();
            $table->string("image")->nullable();
            $table->json("content")->nullable();
            $table->string("template");
            $table->timestamps();
            $table->unsignedBigInteger("parent_id")->nullable();
            $table
                ->foreign("parent_id")
                ->references("id")
                ->on("pages");
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
        Schema::dropIfExists("pages");
    }
}
