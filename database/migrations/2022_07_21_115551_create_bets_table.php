<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            // $table->string('bet_time');
            $table->string('bets_type');
            $table->string('bets_numbers')->nullable();;
            $table->string('bets_sequence')->nullable();;
            $table->string('slug')->unique();
            $table->string('bets_color');
            $table->string('bets_odds');
            
            $table->enum('status',[0,1])->default('1')->comment('0:Inctive,1:Active');;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bets');
    }
}
