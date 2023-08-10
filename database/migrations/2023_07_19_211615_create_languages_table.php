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
        Schema::create("languages", function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->string("slug")->nullable();
            $table->string("flag")->nullable();
            $table->boolean("is_active")->default(true);
            $table->string("podcast_rss_url")->nullable();
            $table->string("image")->nullable();
            $table->foreignId("menu_id")->constrained(table: "nova_menu_menus");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("languages");
    }
};
