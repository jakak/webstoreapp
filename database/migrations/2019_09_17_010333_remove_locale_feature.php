<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveLocaleFeature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channels', function(Blueprint $table) {
            try {
                $table->dropForeign('default_locale_id');
                $table->dropColumn('default_locale_id');
            } catch (Exception $e) {
                echo 'column already dropped';
            }
        });
        Schema::table('product_attribute_values', function(Blueprint $table) {
            $table->dropForeign('locale');
            $table->dropColumn('locale');
        });
        Schema::dropIfExists('channel_locales');
//        Schema::dropIfExists('locales');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::create('locales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->timestamps();
        });*/

        Schema::create('channel_locales', function (Blueprint $table) {
            $table->integer('channel_id')->unsigned();
            $table->integer('locale_id')->unsigned();
            $table->primary(['channel_id', 'locale_id']);
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');
            $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');
        });

        Schema::table('channels', function(Blueprint $table) {
            $table->integer('default_locale_id')->nullable()->unsigned();
            $table->foreign('default_locale_id')->references('id')->on('locales')->onDelete('cascade');
        });
    }
}
