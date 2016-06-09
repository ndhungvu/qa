<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Awnser extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'awnsers';
    CONST ACTIVE = 1;
    CONST UNACTIVE = 0;

    /*
    * This is function get all groups is active
    */
    public static function getAll() {
    	return Awnser::whereNull('deleted_at')->get();
    }

    public static function getAwnserByID($id) {
        return Awnser::where('id', $id)->whereNull('deleted_at')->first();
    }

    public static function getAwnsers($limit = 1000, $offset = 0) {
        return Awnser::where('status', Awnser::ACTIVE)->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')->skip($offset)->take($limit)->get();
    }

    public static function getAwnsersByQuestionID($question_id) {
        return Awnser::where('status', Awnser::ACTIVE)
                    ->whereNull('deleted_at')->where('question_id', $question_id)
                    ->orderBy('created_at', 'DESC')->get();
    }
}
