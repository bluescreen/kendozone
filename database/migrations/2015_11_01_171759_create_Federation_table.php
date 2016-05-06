<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFederationTable extends Migration {

	public function up()
	{
		Schema::create('federation', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('president_id')->nullable()->unsigned();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
//			$table->integer('vicepresident_id')->unsigned()->nullable();
//			$table->integer('secretary_id')->unsigned()->nullable();
//			$table->integer('treasurer_id')->unsigned()->nullable();
//			$table->integer('admin_id')->unsigned()->nullable();
			$table->integer('country_id')->unsigned();
            // Direction, phone, contact

			$table->timestamps();
			$table->engine = 'InnoDB';

			$table->foreign('president_id')
				->references('id')
				->on('users')
				->onUpdate('cascade')
				->onDelete('cascade');

//			$table->foreign('vicepresident_id')
//				->references('id')
//				->on('users')
//				->onUpdate('cascade')
//				->onDelete('cascade');
//
//			$table->foreign('secretary_id')
//				->references('id')
//				->on('users')
//				->onUpdate('cascade')
//				->onDelete('cascade');
//
//			$table->foreign('treasurer_id')
//				->references('id')
//				->on('users')
//				->onUpdate('cascade')
//				->onDelete('cascade');
//
//			$table->foreign('admin_id')
//				->references('id')
//				->on('users')
//				->onUpdate('cascade')
//				->onDelete('cascade');

			$table->foreign('country_id')
				->references('id')
				->on('countries')
				->onUpdate('cascade')
				->onDelete('cascade');


		});
	}

	public function down()
	{
		Schema::drop('federation');
	}
}