<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEvaluationNews extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$q = "delete from news where news_type = 'check_evaluation'";		
		DB::insert(DB::raw($q));

		$q  = "insert into news (object_type, object_id, user_id, sender_id, news_type, created_at, updated_at) ";
		$q .= " values ('Evaluation', (select photo_id from binomial_evaluation where id >= all (select id from binomial_evaluation)), 0, 0, 'check_evaluation', now(), now())";		
		DB::insert(DB::raw($q));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$q = "delete from news where news_type = 'check_evaluation'";		
		DB::insert(DB::raw($q));
	}

}
