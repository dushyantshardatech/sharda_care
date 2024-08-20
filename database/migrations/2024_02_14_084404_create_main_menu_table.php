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
        Schema::create('tbl_main_menu', function (Blueprint $table) {
            $table->id();
            $table->string("menu_name", 60);
            $table->string("display_name", 60);
            $table->string("manage_url", 150);
            $table->tinyInteger('display_order');
            $table->enum('status', [1,0])->default(1);
            $table->string('seo_title');
            $table->text('seo_keywords');
            $table->text('seo_description');
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
        Schema::dropIfExists('tbl_main_menu');
    }
};
