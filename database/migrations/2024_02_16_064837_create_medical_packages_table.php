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
        Schema::create('tbl_medical_packages', function (Blueprint $table) {
            $table->id();
            $table->string('images');
            $table->string('title');
            $table->string('slug');
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
        Schema::dropIfExists('tbl_medical_packages');
    }
};
