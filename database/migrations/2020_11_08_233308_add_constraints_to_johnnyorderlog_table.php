<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToJohnnyorderlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('johnnyorderlog', function (Blueprint $table) {
            $table->foreign('employeeId')->references('id')->on('johnnyemployee')->onDelete('cascade');
            $table->foreign('skuId')->references('id')->on('johnnysku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('johnnyorderlog', function (Blueprint $table) {
            $table->dropForeign(['employeeId']);
            $table->dropForeign(['skuId']);
        });
    }
}
