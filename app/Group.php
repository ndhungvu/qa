<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';
    CONST ACTIVE = 1;
    CONST UNACTIVE = 0;

    /*
    * This is function get all groups is active
    */
    public static function getAll() {
    	return Group::whereNull('deleted_at')->get();
    }

    public static function getGroupByID($id) {
        return Group::where('id', $id)->whereNull('deleted_at')->first();
    }

    /*1 group => n users*/
    public function users() {
        return $this->hasMany('App\User','id','group_id');
    }
}
