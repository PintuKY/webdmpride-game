<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletRequestWidthdrawlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_request_widthdrawls', function (Blueprint $table) {
            $table->id();
            $table->string('req_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('amount', 10);
            $table->decimal('fee_amount', 10)->default(0);
            $table->enum('req_stat',[0,1,2])->default(0)->comment('0:Pending,1:Active,2:Rejected');
            $table->enum('payment_type',['UPI'])->default('UPI');
            $table->bigInteger('req_count');
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
        Schema::dropIfExists('wallet_request_widthdrawls');
    }
}
