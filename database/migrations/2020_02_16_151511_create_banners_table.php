<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('ban_id');
            $table->string('ban_title',100);
            $table->text('ban_subtitle')->nullable();
            $table->string('ban_button',20)->nullable();
            $table->string('ban_url',150)->nullable();
            $table->string('ban_photo',50)->nullable();
            $table->string('ban_slug',30);
            $table->string('ban_status',50)->default(1);
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
        Schema::dropIfExists('banners');
    }
}
