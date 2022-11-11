<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function check_match($user_id, $current_user_id)
    {
        $match_flg = DB::select('select user_id from `matchs` where user_id = ' . $current_user_id . ' and matched_user_id = ' . $user_id);
        log::debug($match_flg);
        return count($match_flg);
    }

    public function check_matchs($user_id, $current_user_id)
    {
        $matchs_flg = DB::select('select user_id from `matchs` where (user_id = ' . $current_user_id . ' and matched_user_id = ' . $user_id . ') or (user_id = ' . $user_id  . ' and matched_user_id = ' . $current_user_id . ')');
        return count($matchs_flg);
    }
}