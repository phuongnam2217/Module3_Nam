<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userService;
    public  function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    function showFormLogin(){
        return view('admin.login');
    }
    function login(Request $request){
        $credentials = $request->only('username','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }
    }
    function  logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
