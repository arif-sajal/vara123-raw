<?php

namespace App\Http\Controllers\Administration\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Auth\Login;
use Illuminate\Http\Request;
use Library\Notify\Facades\Notify;

class LoginController extends Controller
{
    public function loginView(){
        return view('administration.auth.login');
    }

    public function doLogin(Login $request){
        $cred1 = ['username'=>$request->get('username'),'password'=>$request->get('password')];
        $cred2 = ['email'=>$request->get('username'),'password'=>$request->get('password')];

        if(auth('admin')->attempt($cred1,$request->get('remember')) or auth('provider')->attempt($cred1,$request->get('remember'))):
            return $this->checkBan();
        elseif(auth('admin')->attempt($cred2,$request->get('remember')) or auth('provider')->attempt($cred2,$request->get('remember'))):
            return $this->checkBan();
        endif;

        return Notify::send('error','Invalid User Credentials.')->json();
    }

    protected function checkBan(){
        if(auth('admin')->check() && !auth('admin')->user()->is_active):
            auth()->logout();
            return Notify::send('error','Your Account Is Not Active, Please Contact With Administrator.')->json();
        endif;

        if(auth('provider')->check() && !auth('provider')->user()->is_active):
            auth()->logout();
            return Notify::send('error','Your Account Is Not Active, Please Contact With Administrator.')->json();
        endif;

        $redirect = route('admin.dashboard');
        return Notify::send('success','Logged In Successfully. Redirecting, Please Wait.')->callback(['redirect'=>$redirect])->json();
    }
}
