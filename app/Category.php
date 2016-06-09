<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';
    CONST ACTIVE = 1;
    CONST UNACTIVE = 0;

    /*
    * This is function get all groups is active
    */
    public static function getAll() {
    	return Category::whereNull('deleted_at')->get();
    }

    public static function getCategoryByID($id) {
        return Category::where('id', $id)->whereNull('deleted_at')->first();
    }

    public static function getCategories($limit = 1000, $offset = 0) {
        return Category::where('status', Category::ACTIVE)->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')->skip($offset)->take($limit)->get();
    }

    /*
    *This is function used get Categories by parent_id
    */
    public static function getCategoriesByParentID($parent_id = 0){
        return Category::where('status', Category::ACTIVE)->where('parent_id', $parent_id)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')->get();
    }

    public static function getCategoriesByLevelID($level_id = 0){
        return Category::where('status', Category::ACTIVE)->where('level_id', $level_id)
                    ->whereNull('deleted_at')->get();
    }
}
