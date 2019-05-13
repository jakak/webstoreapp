<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channels', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('business_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->enum('status', ['online', 'offline'])->default('online');
            $table->string('country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channels', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('business_name');
            $table->dropColumn('phone_number');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('postal_code');
            $table->dropColumn('state');
            $table->dropColumn('country');
            $table->dropColumn('status');
        });
    }
}
