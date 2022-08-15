<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bet_records', function (Blueprint $table) {
            $table->id();
            $table->integer('bet_id')->nullable();
            $table->string('bet_type')->nullable();
            $table->string('draw_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('bet_amount', 10);
            $table->decimal('win_amount', 10);
            $table->enum('status',[0,1,2])->default(0)->comment('0:Processing,1:Win,2:Lose');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bet_records');
    }
}
