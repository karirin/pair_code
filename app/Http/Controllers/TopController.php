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

class TopController extends Controller
{

    public function index(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        $path = $request->path();
        $message = new Message_relation;
        if ($current_user != "") {
            $message_c = Message_relation::where('user_id', $current_user->id)->first();
            if ($message_c != "") {
                $message_count = $message_c->message_count;
            } else {
                $message_count = '';
            }
            $skills = explode(" ", $current_user->skill);
            $licences = explode(" ", $current_user->licence);
            // $current_count = $user->check_match_current_user($current_user->id);
            // $current_count = $user->check_match_user($current_user->id);
            $param = ['current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count];
        } else {
            $param = ['users' => $users];
        }
        $user = new User;

        return view('top.index', $param);
    }
}