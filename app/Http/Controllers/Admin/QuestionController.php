<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Library\Helper;

use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

use App\Question;
use App\Category;
use App\Awnser;


class questionController extends Controller
{
    CONST LIMIT = 20;
    /**
     * Display a listing of the resource.
     * @Author: Vu Nguyen
     * @Created: 13-12-2015
     */
    public function getIndex()
    {
        $questions = Question::whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate($this::LIMIT);
        return View('admins.questions.index', compact('questions'));
    }

    /**
     * Creating a new resource.
     * @Author: Vu Nguyen
     * @Created: 01-25-2016
     */
    public function getCreate()
    {
        $categories = category::getCategories();
        return View('admins.questions.create',compact('categories'));
    }

    /**
     * Creating a new resource.
     * @Author: Vu Nguyen
     * @Created: 01-25-2016
     */
    public function postCreate()
    {
        $input = array(
            'content' => Input::get('content'),
        );

        $valid = array(
           'content' => 'required',
        );

        $v = Validator::make($input, $valid);
        if($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        $question = new question();
        $question->content = Input::get('content');
        $question->category_id = Input::get('category_id');
        $question->status = Input::get('status');

        $correct = Input::get('is_correct');

        if($question->save()) {
            $id = $question->id;
            $awnsers = Input::get('awnser');
            if(!empty($awnsers)) {
                foreach ($awnsers as $key => $value) {
                    $awnser = new Awnser();
                    $awnser->content = $value;
                    $awnser->question_id = $id;                    
                    if(($key) == $correct)
                        $awnser->is_correct = 1;
                    $awnser->status = 1;
                    $awnser->save();
                }
            }
            return Redirect::route('admin.question.detail', $question->id)->with('flashSuccess', 'Question has been created successful!');
        }else {
            return Redirect::back()->with('flashError', 'Error, Please try again!');
        }
    }

    /**
     * Edit a resource.
     * @Author: Vu Nguyen
     * @Created: 01-25-2016
     */
    public function getEdit($id) {
        $question = Question::getQuestionByID($id);
        $categories = category::getCategories();
        return View('admins.questions.edit', compact('question','categories'));
    }

    /**
     * Edit a resource.
     * @Author: Vu Nguyen
     * @Created: 01-25-2016
     */
    public function postEdit($id) {
        $input = array(
            'content' => Input::get('content'),
        );

        $valid = array(
           'content' => 'required',
        );

        $v = Validator::make($input, $valid);
        if($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        $question = Question::getQuestionByID($id);
        $question->content = Input::get('content');
        $question->category_id = Input::get('category_id');
        $question->status = Input::get('status');

        $correct = Input::get('is_correct');

        if($question->save()) {
            /*Delete awnsers old*/
            if($question->awnsers()->delete()) {
                $awnsers = Input::get('awnser');
                if(!empty($awnsers)) {
                    foreach ($awnsers as $key => $value) {
                        $awnser = new Awnser();
                        $awnser->content = $value;
                        $awnser->question_id = $id;                    
                        if(($key) == $correct)
                            $awnser->is_correct = 1;
                        $awnser->status = 1;
                        $awnser->save();
                    }
                }
            }
            return Redirect::route('admin.question.detail', $question->id)->with('flashSuccess', 'Question has been updated successful!');
        }else {
            return Redirect::back()->with('flashError', 'Error, Please try again!');
        }
    }

    /**
     * Show detail a resource.
     * @Author: Vu Nguyen
     * @Created: 01-25-2016
     */
    public function getDetail($id) {
        $question = Question::getQuestionByID($id);
        return View('admins.questions.detail', compact('question'));
    }

    /**
     * Delete a resource.
     * @Author: Vu Nguyen
     * @Created: 04-12-2015
     */
    public function postDelete($id) {        
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $question = Question::getQuestionByID($id);
            if(!empty($question)) {
                $now = date('Y-m-d H:i:s', time());
                $question->deleted_at = $now;
                if($question->save()) {
                    /*Delete awnsers of question*/
                    $awnsers = Awnser::getAwnsersByQuestionID($id);
                    foreach ($awnsers as $key => $awnser) {
                        $awnser->deleted_at = $now;
                        $awnser->save();
                    }
                    return response()->json([
                        'status' => true,
                        'message'=> 'Question has been deleted successfully.'
                    ]);
                }else {
                    return response()->json([
                        'status' => false,
                        'message'=> 'Error, Please try again!'
                    ], 500);
                }
            }else {
                return response()->json([
                        'status' => false,
                        'message'=> 'Question do not exist in the system. Please try again.'
                    ], 500);
            }
        }
    }

    /**
    * Delete a resource.
    * @Author: Vu Nguyen
    * @Created: 14-12-2015
    */
    public function getDelete($id) {
        $question = Question::getQuestionByID($id);
        if(!empty($question)) {
            $now = date('Y-m-d H:i:s', time());
            $question->deleted_at = $now;
            if($question->save()) {
                /*Delete awnsers of question*/
                $awnsers = Awnser::getAwnsersByQuestionID($id);
                foreach ($awnsers as $key => $awnser) {
                    $awnser->deleted_at = $now;
                    $awnser->save();
                }
                return Redirect::route('admin.questions')->with('flashSuccess', 'Question has been deleted successfully.');
            }else {
                return Redirect::route('admin.question.detail', $question->id)->with('flashError', 'Error, Please try again!');
            }
        }else {
            return Redirect::route('admin.questions')->with('flashError', 'Question do not exist in the system. Please try again.');
        }
    }

    /**
     * Delete all resource.
     * @Author: Vu Nguyen
     * @Created: 01-25-2016
     */
    public function postDeleteAll() {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $checkboxes = Input::get('id');
            $ok = true;
            $now = date('Y-m-d H:i:s', time());
            foreach ($checkboxes as $id) {
                $question = Question::getQuestionByID($id);
                $question->deleted_at = $now;
                if(!$question->save()) {
                    $ok = false;
                    break;
                }else {
                    /*Delete awnsers of question*/
                    $awnsers = Awnser::getAwnsersByQuestionID($id);
                    foreach ($awnsers as $key => $awnser) {
                        $awnser->deleted_at = $now;
                        $awnser->save();
                    }
                }
            }

            if($ok) {
                return response()->json([
                    'status' => true,
                    'message'=> 'Question has been deleted successfully.'
                ]);
            }else {
                return response()->json([
                    'status' => false,
                    'message'=> 'Error, Please try again!'
                ], 500);
            }
        }
    }

    /**
     * Change status of resource.
     * @Author: Vu Nguyen
     * @Created: 04-12-2015
     */
    public function postChangeStatus($id) {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $question = Question::getQuestionByID($id);
            if(!empty($question)) {
                $question->status = $question->status == 0 ? 1 : 0;
                if($question->save()) {
                    return response()->json([
                        'status' => true,
                        'message'=> 'Status of question has been updated successful!'
                    ]);
                }else {
                    return response()->json([
                        'status' => false,
                        'message'=> 'Error, Please try again!'
                    ], 500);
                }
            }else {
                return response()->json([
                        'status' => false,
                        'message'=> 'Question do not exist in the system. Please try again.'
                    ], 500);
            }
        }
    }
}
