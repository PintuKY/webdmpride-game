<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBetsTableCustomBetId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bets', function (Blueprint $table) {
            $table->string('total_angel')->default('360');
            $table->string('bet_angel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bets', function (Blueprint $table) {
            // $table->dropColumn('custom_bet_id');
            $table->dropColumn('total_angel');
            $table->dropColumn('bet_angel');

        });
    }
}
