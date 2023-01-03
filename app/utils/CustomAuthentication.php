<?php

namespace App\utils;

use App\Providers\RouteServiceProvider;

class CustomAuthentication {

    public static function getGuardName($request){
        switch ($request->type) {
            case 'student':
                $guard = 'student';
                break;
            case 'parent':
                $guard = 'parent';
                break;
            case 'teacher':
                $guard = 'teacher';
                break;
            case 'web':
                $guard = 'web';
                break;
            default:
                $guard = null;
                break;
        }
        return $guard;
    }
    // Redirect if authenticated ------------------------------------
    public static function redirectTo($guard){
        if ($guard == 'web') {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        if($guard == 'student') {
            return redirect()->intended('/student/dashboard');
        }
        if($guard == 'parent') {
            return redirect()->intended(RouteServiceProvider::PARENT);
        }
        if($guard == 'teacher') {
            return redirect()->intended('/teacher/dashboard');
        }
    }

}
