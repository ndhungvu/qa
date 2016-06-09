<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Group;
use App\Library\Helper;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Hash;


class UserController extends Controller
{
    CONST LIMIT = 10;
    /**
     * Display a listing of the resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function getIndex()
    {
        $users = User::select('users.*')
                ->leftjoin('groups', function($join)
                {
                    $join->on('users.group_id', '=', 'groups.id')
                    ->whereNull('groups.deleted_at')
                    ->where('groups.status','=', Group::ACTIVE);
                })
                ->whereNull('users.deleted_at')
                ->orderBy('users.created_at', 'DESC')
                ->paginate($this::LIMIT);
        return View('admins.users.index', compact('users'));
    }

    /**
     * Creating a new resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function getCreate()
    {
        /*Get groups*/
        $groups = Group::whereNull('deleted_at')->where('status', Group::ACTIVE)->lists('name', 'id');
        return View('admins.users.create', compact('groups'));
    }

    /**
     * Creating a new resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function postCreate()
    {
        $input = array(
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        $valid = array(
           'username' => 'required',
           'email' => 'required',
           'password' => 'required'
        );

        $v = Validator::make($input, $valid);
        if($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        $user = new User();
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->group_id = Input::get('group_id');
        $user->active_key = Hash::make(time());

        $image_tmp = Input::get('image_tmp');
        if(!empty($image_tmp)) {
            $path_image_tmp = public_path().$image_tmp;
            
            $imageName = md5(time());
            $size = getimagesize(public_path().$image_tmp);
            $ext = image_type_to_extension($size[2]);

            $path_image_new = public_path().'/uploads/avatars/'.$imageName.$ext;
            $content = file_get_contents($path_image_tmp);            
            if(file_put_contents($path_image_new, $content)) {
                /*Delete image tmp*/ 
                \File::delete($path_image_tmp);
                $user->avatar = 'uploads/avatars/'.$imageName.$ext;
            }
        }else {
            $user->avatar = Input::get('image_old');
        }

        if($user->save()) {
            return Redirect::route('admin.user.detail', $user->id)->with('flashSuccess', 'User has been created successful!.');
        }else {
            return Redirect::back()->with('flashError', 'Error, Please try again.');
        }
    }

    /**
     * Edit a resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function getEdit($id) {
        $user = User::getUserByID($id);
        /*Get groups*/
        $groups = Group::whereNull('deleted_at')->where('status', Group::ACTIVE)->lists('name', 'id');
        return View('admins.users.edit', compact('user','groups'));
    }

    /**
     * Edit a resource.
     * @Author: Vu Nguyen
     * @Created: 03-12-2015
     */
    public function postEdit($id) {
        $input = array(
            'username' => Input::get('username'),
            'email' => Input::get('email')
        );

        $valid = array(
           'username' => 'required',
           'email' => 'required'
        );

        $v = Validator::make($input, $valid);
        if($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        $user = User::getUserByID($id);
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->group_id = Input::get('group_id');

        $image_tmp = Input::get('image_tmp');
        if(!empty($image_tmp)) {
            $path_image_tmp = public_path().$image_tmp;
            
            $imageName = md5(time());
            $size = getimagesize(public_path().$image_tmp);
            $ext = image_type_to_extension($size[2]);

            $path_image_new = public_path().'/uploads/avatars/'.$imageName.$ext;
            $content = file_get_contents($path_image_tmp);            
            if(file_put_contents($path_image_new, $content)) {
                /*Delete image tmp*/ 
                \File::delete($path_image_tmp);
                $user->avatar = 'uploads/avatars/'.$imageName.$ext;
            }
        }else {
            $user->avatar = Input::get('image_old');
        }

        if($user->save()) {
            return Redirect::route('admin.user.detail', $user->id)->with('flashSuccess', 'User has been updated successful!');
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
        $user = User::getUserByID($id);
        return View('admins.users.detail', compact('user'));
    }

    /**
     * Delete a resource.
     * @Author: Vu Nguyen
     * @Created: 04-12-2015
     */
    public function postDelete($id) {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $user = User::getUserByID($id);
            if(!empty($user)) {
                $user->deleted_at = date('Y-m-d H:i:s', time());
                if($user->save()) {
                    return response()->json([
                        'status' => true,
                        'message'=> 'User has been deleted successfully.'
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
                        'message'=> 'User do not exist in the system. Please try again.'
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
        $user = User::getUserByID($id);
        if(!empty($user)) {
            $user->deleted_at = date('Y-m-d H:i:s', time());
            if($user->save()) {
                return Redirect::route('admin.articles')->with('flashSuccess', 'User has been deleted successfully.');
            }else {
                return Redirect::route('admin.user.detail', $user->id)->with('flashError', 'Error, Please try again!.');
            }
        }else {
            return Redirect::route('admin.users')->with('flashError', 'User do not exist in the system. Please try again.');
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
                $user = User::getUserByID($id);
                $user->deleted_at = date('Y-m-d H:i:s', time());
                if(!$user->save()) {
                    $ok = false;
                    break;
                }
            }

            if($ok) {
                return response()->json([
                    'status' => true,
                    'message'=> 'User has been deleted successfully.'
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
            $user = User::getUserByID($id);
            if(!empty($user)) {
                $user->status = $user->status == 0 ? 1 : 0;
                if($user->save()) {
                    return response()->json([
                        'status' => true,
                        'message'=> 'Status of user has been updated successful!'
                    ]);
                }else {
                    return response()->json([
                        'status' => false,
                        'message'=> 'Error, Please try again!.'
                    ], 500);
                }
            }else {
                return response()->json([
                        'status' => false,
                        'message'=> 'User do not exist in the system. Please try again.'
                    ], 500);
            }
        }
    }

    /*This is function login to admin system*/
    public function getLogin() {
        return View('admins.users.login');
    }

    public function postLogin() {
        $input = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        $rules = array(
           'username' => 'required',
           'password' => 'required'
        );
        $valid = Validator::make($input, $rules);
        if($valid->fails()) {
            return Redirect::back()->withErrors($valid);
        }

        if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password'], 'group_id'=> 1, 'deleted_at'=> NULL))){
            $user = Auth::user();
            return Redirect::route('admin.dashboard')->with('flashSuccess', 'Login is successful.');
        }
        return Redirect::back()->with('flashError', 'Accounts and password is not valid');
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::route('admin.login');
    }
}
