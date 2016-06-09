<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use App\Category;
use App\Question;
use App\Awnser;
use App\Result;
use App\Library\Helper;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
         /*Get levels*/
        $levels = Helper::levels();
        return View('default.question',compact('levels'));
    }

    public function getCategory($level_id) {
        $categories = Category::getCategoriesByLevelID($level_id);
        return response()->json([
                        'status' => true,
                        'data'=> $categories,
                        'message'=> 'Get data is successful'
                    ]);
    }

    public function getExercise($category_id) {
        $page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1)*$limit;

        $data = array();
        $exercieses = Question::getQuestionByCategoryID($category_id, $limit, $offset);
        if(!empty($exercieses)) {
            foreach ($exercieses as $key => $exerciese) {
                $data[$key] = $exerciese;
                $data[$key]['awnsers'] = Awnser::getAwnsersByQuestionID($exerciese->id);                
            }
        }

        $page++;
        $next_url = '/question/exercise/'.$category_id.'?page='.$page;
        return response()->json([
                        'status' => true,
                        'data'=> $data,
                        'next_url'=>$next_url,
                        'page'=>$page,
                        'message'=> 'Get data is successful'
                    ]);
    }

    public function postAwnser() {
        if(!empty($_POST)) {
            $user_id = 1;
            $str_question = '';
            $str_awnser_correct = '';
            $str_awnser = '';
            $correct_number = 0;
            $number = 0;
            
            $questions = $_POST['question'];
            foreach ($questions as $key => $val) {
                $str_question .= $val.',';
                if(!empty($_POST['awnser_'.$val])) {
                    $str_awnser .= $_POST['awnser_'.$val]. ',';                    
                    $inc = 1;
                    $awnsers = Awnser::getAwnsersByQuestionID($val);
                    if(!empty($awnsers)) {
                        foreach ($awnsers as $key => $awnser) {
                            if($awnser->is_correct) {
                                if($key + 1 == $_POST['awnser_'.$val]) {
                                    ++$correct_number;
                                }
                                break;
                            }
                            $inc++;
                        }
                    }
                    $str_awnser_correct .= $inc.',';
                }else {
                    $inc = 1;
                    $awnsers = Awnser::getAwnsersByQuestionID($val);
                    if(!empty($awnsers)) {
                        foreach ($awnsers as $key => $awnser) {
                            if($awnser->is_correct) {
                                break;
                            }
                            $inc++;
                        }
                    }
                    $str_awnser_correct .= $inc.',';
                    $str_awnser .= '9,';
                }
                ++$number;
            }
            $str_question = substr($str_question,0,strlen($str_question) -1);            
            $str_awnser_correct = substr($str_awnser_correct,0,strlen($str_awnser_correct) -1);
            $str_awnser = substr($str_awnser,0,strlen($str_awnser) -1);

            $result = new Result();
            $result->user_id = $user_id;
            $result->questions = $str_question;
            $result->correct_awnsers = $str_awnser_correct;
            $result->awnsers = $str_awnser;
            $result->correct_number = $correct_number;
            $result->number = $number;
            $result->level_id = $_POST['level_id'];
            $result->category_id = $_POST['category_id'];
            if($result->save()) {
                return response()->json([
                        'status' => true,
                        'data'=> $result,
                        'message'=> 'Exercise is complete'
                    ]);
            }else {
                return response()->json([
                        'status' => false,
                        'message'=> 'System is error.'
                    ]);
            }
        }

    }
}
