<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->increments('id');

						//people Data
						$table->char('cpf',11)->unique();
						$table->string('name',50);
						$table->char('phone',11);
						$table->date('birth')->nulladlbe();
						$table->char('gender',1)->nulladlbe();
						$table->text('notes')->nulladlbe();

						//auth Data
						$table->string('email',80)->unique();
						$table->string('password',254)->nullable();

						//permission Data
						$table->string('status')->default('active');
						$table->string('permission')->default('app.user');

						$table->rememberToken();

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
		Schema::create('users', function(Blueprint $table) {
		});
		Schema::drop('users');
	}

}
