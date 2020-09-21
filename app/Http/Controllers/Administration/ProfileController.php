<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfile(){
        if(auth('admin')->check()):
            return view('administration.pages.profile.admin');
        elseif(auth('provider')->check()):
            return view('administration.pages.profile.provider');
        endif;

        return abort(404);
    }
}
