<?php

namespace App\Http\Controllers\Administration\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function registrationView(){
        return view('administration.auth.registration');
    }
}
