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
        $message_cs = Message_relation::where('user_id', $current_user->id)->get();
        $message_count = 0;
        foreach ($message_cs as $message_c) {
            if ($message_c->message_count != 0 || $message_c->message_count == 'match') {
                $message_count++;
            }
        }
        $match_flg = Match::where('matched_user_id', $current_user->id)->where('match_flg', '!=', 1)->where('unmatch_flg', '!=', 1)->first();
        log::debug($match_flg);
        $param = ['current_user' => $current_user, 'users' => $users, 'user_class' => $user_class, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count, 'match_flg' => $match_flg];
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
        $match = DB::select('select * from matches where matched_user_id= ' . $current_user->id . ' and user_id = ' . $request->user_id);
        if (!empty($match)) {
            DB::table('message_relations')->insert(['user_id' => $current_user->id, 'destination_user_id' => $request->user_id]);
            DB::table('message_relations')->insert(['destination_user_id' => $current_user->id, 'user_id' => $request->user_id]);
            DB::update('update `matches` set match_flg = 1 where matched_user_id = ' . $current_user->id . ' and user_id = ' . $request->user_id . '');
            DB::update('update `matches` set match_flg = 1 where user_id = ' . $current_user->id . ' and matched_user_id = ' . $request->user_id . '');
            Message_relation::where('destination_user_id', $request->user_id)->where('user_id', $current_user->id)->orwhere('user_id', $request->user_id)->where('destination_user_id', $current_user->id)->update(['message_count' => "match"]);
        }
    }

    public function ajax_unmatch_process(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        DB::update('update `matches` set unmatch_flg = 1 where matched_user_id = ' . $current_user->id . ' and user_id = ' . $request->user_id . '');
    }
}
