<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create(UserRequest $request) 
    {
        $request->validated();
        if($request->password !== $request->confirm_password) {
            return redirect()->back()->with('error', 'check your password');
        }

        


    }
}
