<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 50)->unique();
            $table->enum('gender',['Male,Female,Others'])->nullable();
            // $table->string('gender', 50)->nullable();
            $table->string('age', 3)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->decimal('wallet_amount', 10,2)->default(0);
            $table->integer('otp_code')->default(0);
            $table->string('refer_code', 12)->nullable();
            $table->text('refered_by')->nullable();
            $table->enum('role_id',[1,2])->default('2')->comment('1:Admin,2:User');
            $table->enum('status',[0,1])->default('0')->comment('0:Inctive,1:Active');
            $table->enum('verified',[0,1])->default('0')->comment('0:Inctive,1:Active');

            $table->string('account_hol_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_account_no', 50)->nullable();
            $table->string('trans_pin', 50)->nullable();
            $table->enum('bank_status',[0,1,2])->default('0')->comment('0:Pending,1:Active,2:Inctive');

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
        Schema::dropIfExists('users');
    }
}
