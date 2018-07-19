<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function userChats(){
        $user_id = auth()->id();
         $recievers= Message::where('user1', $user_id)
           ->get()->keyBy('user2');
         $senders = Message::where('user2', $user_id)
            ->get()->keyBy('user1');
        $chats =  $recievers->union($senders)->keys();
        $users = $chats->map(function($item){
            return User::find($item);
        });
        return response()->json(['status'=>'success', 'result'=>$users]);

    }
    public function sendMessage(Request $request){
        $message = new Message();
        $message->user1 =  auth()->id();
        $message->user2 =  $request->user2;
        $message->body =  $request->body;
        if($message->save()){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'failed']);
        }

    }
    public function ViewChat($id){
        $user_id = auth()->id();
        $messages = Message::with(['sender', 'receiver'])
            ->where(function($q) use($id, $user_id){
                $q->where('user1', $user_id)
                    ->where('user2', $id);
            })
            ->orWhere(function($q) use($id, $user_id){
                $q->where('user2', $user_id)
                    ->where('user1', $id);
            })
            ->orderBy('created_at', 'asc')
            ->get();
        return response()->json(['status'=>'success', 'result'=>$messages]);
    }
}
