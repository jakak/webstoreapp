<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorPickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_pickers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('top_menu_bg');
            $table->string('top_menu_text');
            $table->string('cart_button_bg');
            $table->string('cart_button_text');
            $table->string('footer_bg');
            $table->string('footer_title');
            $table->string('footer_text');
            $table->string('footer_button');
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
        Schema::dropIfExists('color_pickers');
    }
}
