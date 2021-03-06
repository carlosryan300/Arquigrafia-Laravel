<?php namespace lib\gamification\models;

class Like extends \Eloquent {

	protected $table = "likes";
	protected $fillable = [ 'user_id', 'likable_id', 'likable_type' ];
	
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function likable()
	{
		return $this->morphTo();
	}
	
	public static function getFirstOrCreate($likable, $user) {
		return self::firstOrCreate([
				'user_id' => $user->id,
				'likable_id' => $likable->id,
				'likable_type' => get_class($likable)
			]);
	}

	public function scopeFromUser($query, $user) {
		return $query->where('user_id', $user->id);
	}

	public function scopeWithLikable($query, $likable) {
		return $query->where('likable_type', get_class($likable))
			->where('likable_id', $likable->id);
	}
}