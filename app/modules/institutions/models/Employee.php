<?php
namespace modules\institutions\models;
use modules\institutions\models\Institution as Institution;
use User;
use Role;


class Employee extends \Eloquent {

	protected $fillable = ['user_id','institution_id'];

	protected $table = 'employees';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function institution()
	{
		return $this->belongsTo('Institution');
	}

	public function role()
	{
		return $this->belongsTo('Role');
	}

	public static function updateUserIdInEvaluation($accountFrom, $accountTo)
	{ //DB::table('employees')->where('user_id', '=', $accountFrom->id)->update(array('user_id' => $accountTo->id));
    	Employee::where('user_id', '=', $accountFrom->id)->update(array('user_id' => $accountTo->id));
  	} 

}