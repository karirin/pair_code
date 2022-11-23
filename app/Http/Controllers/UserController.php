<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Person;
use App\User;
use App\Models\Message_relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function add(Request $request)
    {
        return view('user.add');
    }

    protected function create(Request $request)
    {
        $this->validate($request, User::$rules);
        $dir = 'sample';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        $param = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'image' => $request->file('image')->storeAs('storage/' . $dir, $file_name),
        ];
        DB::table('users')->insert($param);
        return view('top.index');
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
        $param = ['current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count, 'message' => $message];
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
            $msg = 'ログインに失敗しました。';
            return redirect('/user/login');
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
        $param = ['current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count];
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
        $param = ['current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count];
        return view('/user/profile', $param);
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

    public function edit(Request $request)
    {
        $current_user = Auth::user();

        $current_user->name = $request->user_name;
        $current_user->age = $request->user_age;
        $current_user->occupation = $request->occupation;
        $current_user->address = $request->address;
        $current_user->skill = $request->myprofile_skills;
        $current_user->licence = $request->myprofile_licences;
        $current_user->workhistory = $request->user_workhistory;
        $current_user->save(); // https://yama-weblog.com/using-fill-method-to-be-a-simple-code/
        return redirect('/user/profile');
    }
}