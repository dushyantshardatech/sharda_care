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
        Schema::create('tbl_banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_name', 100);
            $table->string('banner_url');
            $table->string('banner_images');
            $table->integer('mainmenu_id');
            $table->integer('submenu_id')->nullable()->default(0);
            $table->text('banner_text');
            $table->text('banner_desc');
            $table->string('button_url');
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
        Schema::dropIfExists('tbl_banners');
    }
};
