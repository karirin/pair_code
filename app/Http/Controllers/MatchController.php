<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        $skills = explode(" ", $current_user->skill);
        $licences = explode(" ", $current_user->licence);
        $param = ['current_user' => $current_user, 'users' => $users, 'skills' => $skills, 'licences' => $licences];
        return view('match.match', $param);
    }

    public function ajax_match_process(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        $param = [
            'user_id' => $current_user->id,
            'matched_user_id' => $request->user_id,
        ];
        DB::table('matchs')->insert($param);
        $param = ['current_user' => $current_user, 'users' => $users];
    }
}