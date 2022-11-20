<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Message_relation;
use App\Match;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        $user_class = new User;
        $skills = explode(" ", $current_user->skill);
        $licences = explode(" ", $current_user->licence);
        $message = new Message_relation;
        $message_c = Message_relation::where('user_id', $current_user->id)->first();
        if ($message_c != "") {
            $message_count = $message_c->message_count;
        } else {
            $message_count = '';
        }
        $param = ['current_user' => $current_user, 'users' => $users, 'user_class' => $user_class, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count];
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
        $user = new User;
        DB::table('matches')->insert($param);
        $match = Match::where('matched_user_id', $current_user->id)->where('user_id', $request->user_id)->first();
        if (!empty($match)) {
            DB::table('message_relations')->insert(['user_id' => $current_user->id, 'destination_user_id' => $request->user_id]);
            DB::table('message_relations')->insert(['destination_user_id' => $current_user->id, 'user_id' => $request->user_id]);
            Message_relation::where('destination_user_id', $request->user_id)->where('user_id', $current_user->id)->update(['message_count' => "match"]);;
        }
    }

    public function ajax_unmatch_process(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        Match::where('user_id', $request->user_id)->where('matched_user_id', $current_user->id)->update(['unmatch_flg' => 1]);
    }
}