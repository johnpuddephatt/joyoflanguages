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
        Schema::create("language_podcast", function (Blueprint $table) {
            $table
                ->foreignId("language_id")
                ->constrained("languages")
                ->nullable();

            $table
                ->foreignId("podcast_id")
                ->constrained("podcasts")
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
