<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
    * This is function get all users is active
    */
    public static function getAll() {
        return User::whereNull('deleted_at')->get();
    }

    public static function getUserByID($id) {
        return User::where('id', $id)->whereNull('deleted_at')->first();
    }

    public function group() {
        return $this->belongsTo('App\Group','group_id','id');
    }

    public static function getUserByEmail($email) {
        return User::where('email', $email)->whereNull('deleted_at')->first();
    }

    public static function getUserByFacebookID($facebook_id) {
        return User::where('facebook_id', $facebook_id)->whereNull('deleted_at')->first();
    }

    public static function getUserByTwitterID($twitter_id) {
        return User::where('twitter_id', $twitter_id)->whereNull('deleted_at')->first();
    }
}
