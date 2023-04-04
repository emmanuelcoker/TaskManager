<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $users = User::all();

        if($request->ajax == 'true'){
            return view('ajaxpages.users.index', ['users' => $users]);
         }

         return  view('users.index', ['users' => $users]);
    }
}
