<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';
    CONST ACTIVE = 1;
    CONST UNACTIVE = 0;

    public function category(){
        return $this->belongsTo('App\Category','category_id', 'id');
    }

    public function awnsers(){
        return $this->hasMany('App\Awnser','question_id','id');
    }
    /*
    * This is function get all question is active
    */
    public static function getAll() {
    	return Question::whereNull('deleted_at')->get();
    }

    public static function getQuestionByID($id) {
        return Question::where('id', $id)->whereNull('deleted_at')->first();
    }

    public static function getQuestionByCategoryID($category_id, $limit = 10, $offset = 0){
        return Question::where('status', Question::ACTIVE)->where('category_id', $category_id)
                    ->whereNull('deleted_at')->limit($limit)->offset($offset)->get();
    }
}
