<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'results';
    CONST ACTIVE = 1;
    CONST UNACTIVE = 0;

    public function user()
	{
	    return $this->belongsTo('App\User', 'user_id');
	}

	public function category()
	{
	    return $this->belongsTo('App\Category', 'category_id');
	}

	public static function getResultByID($id) {
        return Result::where('id', $id)->whereNull('deleted_at')->first();
    }

}
