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
        Schema::create('tbl_privacy_policy', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('tab_id');
            $table->text('description');
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
        Schema::dropIfExists('tbl_privacy_policy');
    }
};
