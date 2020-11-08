<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToJohnnypaymentlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('johnnypaymentlog', function (Blueprint $table) {
            $table->foreign('employeeId')->references('id')->on('johnnyemployee')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('johnnypaymentlog', function (Blueprint $table) {
            $table->dropForeign(['employeeId']);
        });
    }
}
