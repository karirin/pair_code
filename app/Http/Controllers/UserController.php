<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Person;
use App\User;
use App\Match;
use App\Models\Message_relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function add(Request $request)
    {
        $add_message = '';
        return view('user.add', ['add_message' => $add_message]);
    }

    protected function create(Request $request)
    {
        $this->validate($request, User::$rules);
        $user_flg = User::where('name', $request->name)->first();
        if ($user_flg != '') {
            $add_message = 'すでに存在するユーザー名です';
            return view('user.add', ['add_message' => $add_message]);
        } else {
            if ($request->file('image') != '') {
                $file_name = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/sample', $file_name);
                $param = [
                    'name' => $request->name,
                    'password' => $request->password,
                    'hash_password' => Hash::make($request->password),
                    'image' => 'storage/sample/' . $file_name,
                ];
            } else {
                $param = [
                    'name' => $request->name,
                    'password' => $request->password,
                    'hash_password' => Hash::make($request->password),
                    'image' => '',
                ];
            }
            return view('user.edit_detail', $param);
        }
    }

    protected function edit_detail(Request $request)
    {
        $form = [
            'name' => $request->name,
            'password' => $request->hash_password,
            'image' => $request->image,
            'age' => $request->age,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'skill' => $request->myprofile_skills,
            'licence' => $request->myprofile_licences,
            'workhistory' => $request->user_workhistory,
        ];
        DB::table('users')->insert($form);
        if (Auth::attempt([
            'name' => $request->name,
            'password' => $request->password
        ])) {
            $current_user = Auth::user();
            $users = User::get();
            $skills = explode(" ", $current_user->skill);
            $licences = explode(" ", $current_user->licence);
            $message = new Message_relation;
            $message_cs = Message_relation::where('user_id', $current_user->id)->get();
            $message_count = 0;
            foreach ($message_cs as $message_c) {
                if ($message_c->message_count != 0 || $message_c->message_count == 'match') {
                    $message_count++;
                }
            }
            $top_message = $request->name . 'さんがログインしました';
            $match_flg = Match::where('matched_user_id', $current_user->id)->where('match_flg', '!=', 1)->where('unmatch_flg', '!=', 1)->first();
            $param = ['current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count, 'message' => $message, 'top_message' => $top_message, 'match_flg' => $match_flg];
            return view('user.add_match', $param);
        } else {
            redirect('/top');
        }
    }

    public function skip(Request $request)
    {
        $form = [
            'name' => $request->name,
            'password' => $request->hash_password,
            'image' => $request->image,
        ];
        DB::table('users')->insert($form);
        if (Auth::attempt([
            'name' => $request->name,
            'password' => $request->password
        ])) {
            $current_user = Auth::user();
            $users = User::get();
            $skills = explode(" ", $current_user->skill);
            $licences = explode(" ", $current_user->licence);
            $message = new Message_relation;
            $message_cs = Message_relation::where('user_id', $current_user->id)->get();
            $message_count = 0;
            foreach ($message_cs as $message_c) {
                if ($message_c->message_count != 0 || $message_c->message_count == 'match') {
                    $message_count++;
                }
            }
            $top_message = $request->name . 'さんがログインしました';
            $match_flg = Match::where('matched_user_id', $current_user->id)->where('match_flg', '!=', 1)->where('unmatch_flg', '!=', 1)->first();
            $param = ['current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count, 'message' => $message, 'top_message' => $top_message, 'match_flg' => $match_flg];
            return view('top.index', $param);
        }
    }

    public function login(Request $request)
    {
        $message = null;
        $param = ['message' => $message];
        return view('user.login', $param);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->loggedOut($request) ?: redirect('/top');
    }

    public function auth(Request $request)
    {
        $this->validate($request, User::$rules);
        $name = $request->name;
        $password = $request->password;
        if (Auth::attempt([
            'name' => $name,
            'password' => $password
        ])) {
            $msg = 'ログインしました。（' . Auth::user()->name . '）';
        } else {
            $message = 'ユーザー名とパスワードが一致しません';
            return view('user.login', ['message' => $message]);
        }
        $current_user = Auth::user();
        $users = User::get();
        $skills = explode(" ", $current_user->skill);
        $licences = explode(" ", $current_user->licence);
        $message = new Message_relation;
        $message_cs = Message_relation::where('user_id', $current_user->id)->get();
        $message_count = 0;
        foreach ($message_cs as $message_c) {
            if ($message_c->message_count != 0 || $message_c->message_count == 'match') {
                $message_count++;
            }
        }
        $top_message = $request->name . 'さんがログインしました';
        $match_flg = Match::where('matched_user_id', $current_user->id)->where('match_flg', '!=', 1)->where('unmatch_flg', '!=', 1)->first();
        $param = [
            'current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count, 'message' => $message, 'top_message' => $top_message, 'match_flg' => $match_flg
        ];
        return view('top.index', $param);
    }

    protected function loggedOut(Request $request)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function test_login(Request $request)
    {
        $name = $request->name;
        $password = $request->password;
        if (Auth::attempt([
            'name' => $name,
            'password' => $password
        ])) {
            $msg = 'ログインしました。（' . Auth::user()->name . '）';
        } else {
            $message = 'お試しログインに失敗しました';
            return view('user.login', ['message' => $message]);
        }
        $current_user = Auth::user();
        $users = User::get();
        $skills = explode(" ", $current_user->skill);
        $licences = explode(" ", $current_user->licence);
        $message_cs = Message_relation::where('user_id', $current_user->id)->get();
        $message_count = 0;
        foreach ($message_cs as $message_c) {
            if ($message_c->message_count != 0 || $message_c->message_count == 'match') {
                $message_count++;
            }
        }
        $top_message = $request->name . 'さんがログインしました';
        $match_flg = Match::where('matched_user_id', $current_user->id)->where('match_flg', '!=', 1)->where('unmatch_flg', '!=', 1)->first();
        $param = ['current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count, 'top_message' => $top_message, 'match_flg' => $match_flg];
        return view('top.index', $param);
    }

    public function profile(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        $skills = explode(" ", $current_user->skill);
        $licences = explode(" ", $current_user->licence);
        $message_cs = Message_relation::where('user_id', $current_user->id)->get();
        $message_count = 0;
        foreach ($message_cs as $message_c) {
            if ($message_c->message_count != 0 || $message_c->message_count == 'match') {
                $message_count++;
            }
        }
        $match_flg = Match::where('matched_user_id', $current_user->id)->where('match_flg', '!=', 1)->where('unmatch_flg', '!=', 1)->first();
        $param = ['current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count, 'match_flg' => $match_flg];
        return view('/user/profile', $param);
    }

    public function edit(Request $request)
    {
        $current_user = Auth::user();
        $current_user->name = $request->user_name;
        if ($request->file('image_name') != '') {
            $file_name = $request->file('image_name')->getClientOriginalName();
            $request->file('image_name')->storeAs('public/sample', $file_name);
            $current_user->image = 'storage/sample/' . $file_name;
        }
        $current_user->age = $request->user_age;
        $current_user->occupation = $request->occupation;
        $current_user->address = $request->address;
        $current_user->skill = $request->myprofile_skills;
        $current_user->licence = $request->myprofile_licences;
        $current_user->workhistory = $request->user_workhistory;
        $current_user->profile = $request->user_profile;
        $current_user->save(); // https://yama-weblog.com/using-fill-method-to-be-a-simple-code/
        return redirect('/user/profile');
    }

    public function add_match(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        $param = ['users' => $users, 'current_user' => $current_user];
        return view('user.add_match', $param);
    }

    // public function edit(Request $request)
    // {
    //     $current_user = Auth::user();
    //     if ($request->current_name != $request->user_name) {
    //         $current_user->name = $request->user_name;
    //     }
    //     if ($request->current_name != $request->user_name_narrow) {
    //         $current_user->name = $request->user_name_narrow;
    //     }
    //     if ($request->current_age != $request->user_age) {
    //         $current_user->age = $request->user_age;
    //     }
    //     if ($request->current_age != $request->user_age_narrow) {
    //         $current_user->age = $request->user_age_narrow;
    //     }
    //     if ($request->current_occupation != $request->occupation) {
    //         $current_user->occupation = $request->occupation;
    //     }
    //     if ($request->current_occupation != $request->occupation_narrow) {
    //         $current_user->occupation = $request->occupation_narrow;
    //     }
    //     if ($request->current_address != $request->address) {
    //         $current_user->address = $request->address;
    //     }
    //     if ($request->current_address != $request->address_narrow) {
    //         $current_user->address = $request->address_narrow;
    //     }
    //     if ($request->current_skill != $request->myprofile_skills) {
    //         $current_user->skill = $request->myprofile_skills;
    //     }
    //     if ($request->current_skill != $request->skills) {
    //         $current_user->skill = $request->skills;
    //     }
    //     log::debug("||||||||");
    //     log::debug($request->current_licence);
    //     log::debug($request->myprofile_licences);
    //     log::debug("||||||||");
    //     if ($request->current_licence != $request->myprofile_licences) {
    //         log::debug("test1");
    //         $current_user->licence = $request->myprofile_licences;
    //     }
    //     log::debug("||||||||");
    //     log::debug($request->current_licence);
    //     log::debug($request->myprofile_licences_narrow);
    //     log::debug("||||||||");
    //     if ($request->current_licence != $request->myprofile_licences_narrow) {
    //         log::debug("test2");
    //         $current_user->licence = $request->myprofile_licences_narrow;
    //     }
    //     if ($request->current_workhistory != $request->user_workhistory) {
    //         $current_user->workhistory = $request->user_workhistory;
    //     }
    //     if ($request->current_workhistory != $request->user_workhistory_narrow) {
    //         $current_user->workhistory = $request->user_workhistory_narrow;
    //     }
    //     log::debug($request);
    //     log::debug($current_user);
    //     $current_user->save(); // https://yama-weblog.com/using-fill-method-to-be-a-simple-code/
    //     return redirect('/user/profile');
    // }

    public function ajax_flg(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        DB::update('update `users` set top_flg = 1 where id = ' . $current_user->id . '');
    }

    public function ajax_m_flg(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        DB::update('update `users` set match_flg = 1 where id = ' . $current_user->id . '');
    }
}
