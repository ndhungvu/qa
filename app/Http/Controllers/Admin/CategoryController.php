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

use App\Category;
use App\Level;


class CategoryController extends Controller
{
    CONST LIMIT = 20;
    /**
     * Display a listing of the resource.
     * @Author: Vu Nguyen
     * @Created: 13-12-2015
     */
    public function getIndex()
    {
        $categories = Category::whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->paginate($this::LIMIT);
        return View('admins.categories.index', compact('categories'));
    }

    /**
     * Creating a new resource.
     * @Author: Vu Nguyen
     * @Created: 01-25-2016
     */
    public function getCreate()
    {
        /*Get levels*/
        $levels = Helper::levels();
        return View('admins.categories.create', compact('levels'));
    }

    /**
     * Creating a new resource.
     * @Author: Vu Nguyen
     * @Created: 01-25-2016
     */
    public function postCreate(Request $request)
    {
        $input = array(
            'name' => $request->input('name'),
        );

        $valid = array(
           'name' => 'required',
        );

        $v = Validator::make($input, $valid);
        if($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = 0;
        $category->level_id = $request->input('level_id');
        $category->status = $request->input('status');

        if($category->save()) {
            return Redirect::route('admin.category.detail', $category->id)->with('flashSuccess', 'Category has been created successful!');
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
        $category = Category::getcategoryByID($id);
        /*Get levels*/
        $levels = Helper::levels();
        return View('admins.categories.edit', compact('category','levels'));
    }

    /**
     * Edit a resource.
     * @Author: Vu Nguyen
     * @Created: 01-25-2016
     */
    public function postEdit($id) {
        $input = array(
            'name' => Input::get('name'),
        );

        $valid = array(
           'name' => 'required',
        );

        $v = Validator::make($input, $valid);
        if($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        $category = Category::getcategoryByID($id);
        $category->name = Input::get('name');
        $category->description = Input::get('description');
        $category->parent_id = 0;
        $category->level_id = Input::get('level_id');
        $category->status = Input::get('status');

        if($category->save()) {
            return Redirect::route('admin.category.detail', $category->id)->with('flashSuccess', 'Category has been updated successful!');
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
        $category = Category::getcategoryByID($id);
        return View('admins.categories.detail', compact('category'));
    }

    /**
     * Delete a resource.
     * @Author: Vu Nguyen
     * @Created: 04-12-2015
     */
    public function postDelete($id) {        
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $category = Category::getcategoryByID($id);
            if(!empty($category)) {
                $category->deleted_at = date('Y-m-d H:i:s', time());
                if($category->save()) {
                    return response()->json([
                        'status' => true,
                        'message'=> 'Category has been deleted successfully.'
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
                        'message'=> 'Category do not exist in the system. Please try again.'
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
        $category = Category::getcategoryByID($id);
        if(!empty($category)) {
            $category->deleted_at = date('Y-m-d H:i:s', time());
            if($category->save()) {
                return Redirect::route('admin.categories')->with('flashSuccess', 'Category has been deleted successfully.');
            }else {
                return Redirect::route('admin.category.detail', $category->id)->with('flashError', 'Error, Please try again!');
            }
        }else {
            return Redirect::route('admin.categories')->with('flashError', 'Category do not exist in the system. Please try again.');
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
                $category = Category::getcategoryByID($id);
                $category->deleted_at = date('Y-m-d H:i:s', time());
                if(!$category->save()) {
                    $ok = false;
                    break;
                }
            }

            if($ok) {
                return response()->json([
                    'status' => true,
                    'message'=> 'Categories has been deleted successfully.'
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
            $category = Category::getcategoryByID($id);
            if(!empty($category)) {
                $category->status = $category->status == 0 ? 1 : 0;
                if($category->save()) {
                    return response()->json([
                        'status' => true,
                        'message'=> 'Status of category has been updated successful!'
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
                        'message'=> 'Category do not exist in the system. Please try again.'
                    ], 500);
            }
        }
    }
}
