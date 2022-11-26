<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Socialite;


class SocialUser extends Model
{
    public function user()
    {
        log::debug("@@@@@@@@@@@3");
        return $this->belongsTo(User::class);
    }

    public function callback()
    {
        log::debug("@@@@@@@@@@@1");
        $providerUser = Socialite::driver('Twitter')->user();

        // 既に存在するユーザーかを確認
        $socialUser = SocialUser::where('provider_user_id', $providerUser->id)->first();

        if ($socialUser) {
            // 既存のユーザーはログインしてトップページへ
            Auth::login($socialUser->user, true);
            log::debug("@@@@@@@@@@@2");
            return redirect('/top');
        }

        // 新しいユーザーを作成
        $user = new User();
        $user->unique_id = $providerUser->nickname;
        $user->name = $providerUser->name;
        $user->avatar = $providerUser->user['profile_image_url_https'];
        $user->bio = $providerUser->user['description'];

        $socialUser = new SocialUser();
        $socialUser->provider_user_id = $providerUser->id;

        DB::transaction(function () use ($user, $socialUser) {
            $user->save();
            $user->socialUsers()->save($socialUser);
        });

        Auth::login($user, true);
        return redirect('/top');
    }
}