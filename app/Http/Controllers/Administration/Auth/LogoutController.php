<?php

namespace App\Http\Controllers\Administration\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(){
        if(auth()->guard('admin')->check()):
            auth()->guard('admin')->logout();
        elseif(auth()->guard('provider')->check()):
            auth()->guard('provider')->logout();
        endif;
        return redirect()->route('login.view');
    }
}
