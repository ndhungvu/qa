<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use Hash;
use Socialite;
use Session;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    public function getLogin() {
        return View('accounts.login');
    }

    public function postLogin(Request $request) {
        if($request->ajax()){
            $input = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            $rules = array(
               'email' => 'required',
               'password' => 'required'
            );
            $valid = Validator::make($input, $rules);
            if($valid->fails()) {
                return response()->json([
                    'status' => false,
                    'message'=> 'Email và mật khẩu không chính xác.'
                ]);
            }

            if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password'], 'deleted_at'=> NULL))){
                $user = Auth::user();
                Session::push('USER', $user);
                return response()->json([
                    'status' => true,
                    'message'=> 'Đăng nhập thành công.'
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message'=> 'Email và mật khẩu không hợp lệ.'
                ]);
            }
        
        }else{
            return redirect()->route('homepage');
        }
        
    }
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function getLoginByFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function getFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('/auth/facebook');
        } 
        $authUser = $this->getFacebookUser($user); 
        Auth::login($authUser, true); 
        return redirect()->route('homepage');
    }
 
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $fb_user
     * @return User
     */
    private function getFacebookUser($fb_user)
    {
        $authUser = User::getUserByFacebookID($fb_user->id);
        if ($authUser){
            Session::push('USER', $authUser);
            return $authUser;
        }
        
        /*Get user by email*/
        $user = User::getUserByEmail($fb_user->email);
        if($user) {
            $user->facebook_id = $fb_user->id;
            if($user->save()) {
                Session::push('USER', $user);
                return $user;
            }
        }else {
            $avatar = '';
            $content = file_get_contents($fb_user->avatar);
            $img_new_path = 'uploads/avatars/'.time().'.jpg';      
            if(file_put_contents($img_new_path, $content)) {
                $avatar = $img_new_path;
            }

            $user = new User();
            $user->facebook_id = $fb_user->id;
            $user->email = $fb_user->email;
            $user->avatar = $avatar;
            $user->active_key = Hash::make(time());
            $user->group_id = 3;

            if($user->save()) {
                Session::push('USER', $user);
                return $user;
            }
        }        
        return null;
    }

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */
    public function getLoginByTWitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
 
    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */
    public function getTwitterCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('/auth/twitter');
        }
 
        $authUser = $this->getTwitterUser($user);
 
        Auth::login($authUser, true);
 
        return redirect()->route('homepage');
    }
 
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function getTwitterUser($tw_user)
    {
        $authUser = User::getUserByTwitterID($tw_user->id); 
        if ($authUser){
            Session::push('USER', $authUser);
            return $authUser;
        }

        $avatar = '';
        $content = file_get_contents($tw_user->avatar);
        $img_new_path = 'uploads/avatars/'.time().'.jpg';      
        if(file_put_contents($img_new_path, $content)) {
            $avatar = $img_new_path;
        }

        $user = new User();
        $user->twitter_id = $tw_user->id;
        $user->username = $tw_user->nickname;
        $user->avatar = $avatar;
        $user->active_key = Hash::make(time());
        $user->group_id = 3;

        if($user->save()) {
            Session::push('USER', $user);
            return $user;
        }
        return null;
    }

    /**
    *This is function logout
    *@Author: Vu Nguyen
    *Created 12-25-2015
    */
    public function getLogout() {
        Auth::logout();
        Session::flush();
        return Redirect::route('homepage');
    }
}
