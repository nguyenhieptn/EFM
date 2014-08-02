<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("incomes",function(Blueprint $table){
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('account_id');
            $table->integer('user_id');
            $table->bigInteger('amount');
            $table->string('description',255);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('incomes');
    }

}
