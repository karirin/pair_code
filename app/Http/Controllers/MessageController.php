<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use DateTime;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $current_user = Auth::user();
        $destination_user = User::find($request->user_id);
        $message_c = new Message;
        $messages = DB::select('select * from messages where ( user_id = ' . $current_user->id . ' and destination_user_id = ' . $destination_user->id . ' ) or ( user_id = ' . $destination_user->id . ' and destination_user_id = ' . $current_user->id . ' )');
        $param = ['current_user' => $current_user, 'messages' => $messages, 'destination_user' => $destination_user, 'message_c' => $message_c];
        return view('message.message', $param);
    }

    public function add(Request $request)
    {
        $this->validate($request, Message::$rules);
        $message = new Message;
        $message->user_id = $request->current_user_id;
        $message->destination_user_id = $request->destination_user_id;
        $message->text = $request->text;
        $date = new DateTime();
        $date->modify('+9 hour');
        $created_at = $date->format('Y-m-d H:i:s');
        $message->created_at = $created_at;
        $message->save();
        $current_user = Auth::user();
        $destination_user = User::find($request->user_id);
        $message_c = new Message;
        $messages = DB::select('select * from messages where ( user_id = ' . $current_user->id . ' and destination_user_id = ' . $destination_user->id . ' ) or ( user_id = ' . $destination_user->id . ' and destination_user_id = ' . $current_user->id . ' )');
        $param = ['current_user' => $current_user, 'destination_user' => $destination_user, 'messages' => $messages, 'message_c' => $message_c];
        return view('message.message', $param);
    }
}