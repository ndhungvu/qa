<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group;
use App\Library\Helper;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;


class GroupController extends Controller
{
    CONST LIMIT = 10;
    /**
     * Display a listing of the resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function getIndex()
    {
        $groups = Group::whereNull('deleted_at')->orderBy('created_at', 'DESC')->paginate($this::LIMIT);
        return View('admins.groups.index', compact('groups'));
    }

    /**
     * Creating a new resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function getCreate()
    {
        return View('admins.groups.create');
    }

    /**
     * Creating a new resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function postCreate()
    {
        $input = array(
           'name' => Input::get('name')
        );

        $valid = array(
           'name' => 'required'
        );

        $v = Validator::make($input, $valid);
        if($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        $group = new Group();
        $group->name = Input::get('name');
        $group->description = Input::get('description');
        $group->status = Input::get('status');

        if($group->save()) {
            return Redirect::route('admin.group.detail', $group->id)->with('flashSuccess', 'Group has been created successful!');
        }else {
            return Redirect::back()->with('flashError', 'Error, Please try again!');
        }
    }

    /**
     * Edit a resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function getEdit($id) {
        $group = Group::getGroupByID($id);
        return View('admins.groups.edit', compact('group'));
    }

    /**
     * Edit a resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function postEdit($id) {
        $input = array(
           'name' => Input::get('name')
        );

        $valid = array(
           'name' => 'required'
        );

        $v = Validator::make($input, $valid);
        if($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        $group = Group::getGroupByID($id);
        $group->name = Input::get('name');
        $group->description = Input::get('description');
        $group->status = Input::get('status');

        if($group->save()) {
            return Redirect::route('admin.group.detail', $group->id)->with('flashSuccess', 'Group has been updated successful!');
        }else {
            return Redirect::back()->with('flashError', 'Error, Please try again!');
        }
    }

    /**
     * Show detail a resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function getDetail($id) {
        $group = Group::getGroupByID($id);
        return View('admins.groups.detail', compact('group'));
    }

    /**
     * Delete a resource.
     * @Author: Vu Nguyen
     * @Created: 04-12-2015
     */
    public function postDelete($id) {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $group = Group::getGroupByID($id);
            if(!empty($group)) {
                $group->deleted_at = date('Y-m-d H:i:s', time());
                if($group->save()) {
                    return response()->json([
                        'status' => true,
                        'message'=> 'Group has been deleted successfully.'
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
                        'message'=> 'Group do not exist in the system. Please try again.'
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
        $group = Group::getGroupByID($id);
        if(!empty($group)) {
            $group->deleted_at = date('Y-m-d H:i:s', time());
            if($group->save()) {
                return Redirect::route('admin.articles')->with('flashSuccess', 'Group has been deleted successfully.');
            }else {
                return Redirect::route('admin.group.detail', $group->id)->with('flashError', 'Error, Please try again!');
            }
        }else {
            return Redirect::route('admin.groups')->with('flashError', 'Group do not exist in the system. Please try again.');
        }
    }

    /**
     * Delete all resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function postDeleteAll() {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $checkboxes = Input::get('id');
            $ok = true;
            foreach ($checkboxes as $id) {
                $group = Group::getGroupByID($id);
                $group->deleted_at = date('Y-m-d H:i:s', time());
                if(!$group->save()) {
                    $ok = false;
                    break;
                }
            }

            if($ok) {
                return response()->json([
                    'status' => true,
                    'message'=> 'Groups has been deleted successfully.'
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
            $group = Group::getGroupByID($id);
            if(!empty($group)) {
                $group->status = $group->status == 0 ? 1 : 0;
                if($group->save()) {
                    return response()->json([
                        'status' => true,
                        'message'=> 'Status of group has been updated successful!'
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
                        'message'=> 'Group do not exist in the system. Please try again.'
                    ], 500);
            }
        }
    }
}
