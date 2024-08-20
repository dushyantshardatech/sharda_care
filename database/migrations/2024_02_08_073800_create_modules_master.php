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
        Schema::create('tbl_modules_master', function (Blueprint $table) {
            $table->id();
            $table->string("module_name");
            $table->string("display_name");
            $table->enum('is_visible_configsetup', [1,0])->default(0);
            $table->enum('setup_type', [1,0,2])->default(0);
            $table->string("display_icon");
            $table->tinyInteger('display_order');
            $table->enum('status', [1,0])->default(1);
            $table->tinyInteger('is_deleted');
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
        Schema::dropIfExists('tbl_modules_master');
    }
};
