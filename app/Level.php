<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'levels';
    CONST ACTIVE = 1;
    CONST UNACTIVE = 0;

    /*
    * This is function get all groups is active
    */
    public static function getAll() {
    	return Level::whereNull('deleted_at')->get();
    }

    public static function getLevelByID($id) {
        return Level::where('id', $id)->whereNull('deleted_at')->first();
    }
}

