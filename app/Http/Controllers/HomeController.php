<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\utils\CustomAuthentication;

class HomeController extends Controller
{
    public function index($type) {
        return view('auth.login',compact('type'));
    }
    public function dashboard() {
        return view('dashboard');
    }

    public function store(LoginRequest $request){
        $guard = CustomAuthentication::getGuardName($request);

        if(Auth::guard($guard)->attempt(['email'=>$request->email,'password'=>$request->password])){
          return  customAuthentication::redirectTo($guard);
        }
        else{
            return redirect('/login'.'/'. $guard);
        }
    }

    public function destroy(Request $request,$type) {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
