<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Message;
use App\Models\Message_relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Message_relationController extends Controller
{
    public function index(Request $request)
    {
        $current_user = Auth::user();
        $users = User::get();
        $message_relations =  Message_relation::select([
            '*',
        ])
            ->from('message_relations as m')
            ->join('users as u', function ($join) {
                $join->on('m.destination_user_id', '=', 'u.id');
            })
            ->where('m.user_id', '=', $current_user->id)
            ->get();
        $message_relation =  new Message_relation;
        $skills = explode(" ", $current_user->skill);
        $licences = explode(" ", $current_user->licence);
        $message_count = $message_relation->getmessagecount($current_user->id);
        $param = ['current_user' => $current_user, 'users' => $users, 'message_relations' => $message_relations, 'skills' => $skills, 'licences' => $licences, 'message_count' => $message_count];
        return view('message.message_top', $param);
    }
}