<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Person;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TopController extends Controller
{

    public function index(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        if ($current_user != "") {
            $skills = explode(" ", $current_user->skill);
            $licences = explode(" ", $current_user->licence);
            $param = ['current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences];
        } else {
            $param = ['users' => $users];
        }
        return view('top.index', $param);
    }
}