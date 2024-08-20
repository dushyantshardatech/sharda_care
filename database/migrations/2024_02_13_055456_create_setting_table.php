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
        Schema::create('tbl_setting', function (Blueprint $table) {
            $table->id();
            $table->string("logo");
            $table->string("contact_no", 15);
            $table->string("facebook_icon", 60);
            $table->string("facebook_link");
            $table->string("twitter_icon", 60);
            $table->string("twitter_link");
            $table->string("instagram_icon", 60);
            $table->string("instagram_link");
            $table->string("youtube_icon", 60);
            $table->string("youtube_link");
            $table->string("linkedin_icon", 60);
            $table->string("linkedin_link");
            $table->tinyInteger('display_order');
            $table->enum('status', [1,0])->default(1);
            $table->enum('is_deleted', [1,0])->default(0);
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
        Schema::dropIfExists('tbl_setting');
    }
};
