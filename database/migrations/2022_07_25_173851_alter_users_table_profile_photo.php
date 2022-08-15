<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableProfilePhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_photo')->after('age')->nullable();
            $table->string('refer_user_id', 12)->after('refer_code')->nullable();
            $table->after('bank_status', function ($table) {
                $table->string('upi_holder_name')->nullable();
                $table->string('upi_id')->nullable();
                $table->enum('upi_status',[0,1,2])->default('0')->comment('0:Pending,1:Active,2:Inctive');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_photo');
            $table->dropColumn('refer_user_id');
            $table->dropColumn('upi_holder_name');
            $table->dropColumn('upi_id');
            $table->dropColumn('upi_status');
        });
    }
}
