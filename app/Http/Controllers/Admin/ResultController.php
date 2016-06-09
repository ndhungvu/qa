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

use App\Result;


class ResultController extends Controller
{
    CONST LIMIT = 20;
    /**
     * Display a listing of the resource.
     * @Author: Vu Nguyen
     * @Created: 17-2-2015
     */
    public function getIndex()
    {
        $results = Result::whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate($this::LIMIT);
        return View('admins.results.index', compact('results'));
    }

    /**
     * Delete a resource.
     * @Author: Vu Nguyen
     * @Created: 04-12-2015
     */
    public function postDelete($id) {        
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $result = Result::getResultByID($id);
            if(!empty($result)) {
                $result->deleted_at = date('Y-m-d H:i:s', time());
                if($result->save()) {
                    return response()->json([
                        'status' => true,
                        'message'=> 'Result has been deleted successfully.'
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
                        'message'=> 'Result do not exist in the system. Please try again.'
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
        $result = Result::getResultByID($id);
        if(!empty($result)) {
            $result->deleted_at = date('Y-m-d H:i:s', time());
            if($result->save()) {
                return Redirect::route('admin.results')->with('flashSuccess', 'Result has been deleted successfully.');
            }else {
                return Redirect::route('admin.result.detail', $result->id)->with('flashError', 'Error, Please try again!');
            }
        }else {
            return Redirect::route('admin.results')->with('flashError', 'Result do not exist in the system. Please try again.');
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
            foreach ($checkboxes as $id) {
                $result = Result::getResultByID($id);
                $result->deleted_at = date('Y-m-d H:i:s', time());
                if(!$result->save()) {
                    $ok = false;
                    break;
                }
            }

            if($ok) {
                return response()->json([
                    'status' => true,
                    'message'=> 'Results has been deleted successfully.'
                ]);
            }else {
                return response()->json([
                    'status' => false,
                    'message'=> 'Error, Please try again!'
                ], 500);
            }
        }
    }

}
