<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create("expenses",function(Blueprint $table){
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('account_id');
            $table->integer('user_id');
            $table->integer('payee_id')->nullable();
            $table->bigInteger('amount');
            $table->string('description',255)->nullable();
            $table->string('event',255)->nullable();
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
		Schema::drop('expenses');
	}

}
