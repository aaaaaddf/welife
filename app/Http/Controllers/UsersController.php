<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function show($id){
        $user = User::findOrFail($id);
        
        $campposts= $user->campposts()->orderBy('created_at','desc')->paginate(10);
        
        return view('users.show',[
            'user'=>$user,
            'campposts'=>$campposts
            ]);
    }
}
