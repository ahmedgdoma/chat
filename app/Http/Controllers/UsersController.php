<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function viewUsers(){
        $user_id = auth()->id();
        $users = User::where('id','!=', $user_id)->get();
        return response()->json(['status'=>'success', 'result'=>$users]);
    }
}
