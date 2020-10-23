<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Admin\UpdateProfile;
use App\Http\Requests\Administration\Provider\ProfileUpdate;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Library\Notify\Facades\Notify;

class ProfileController extends Controller
{
    public function viewProfile($id){
        if(auth('admin')->check()):
            $user = Admin::find($id);
            return view('administration.pages.profile.admin', compact('user') );
        elseif(auth('provider')->check()):
            $user = Provider::find($id);
            return view('administration.pages.profile.provider', compact('user'));
        endif;

        return abort(404);
    }

    //for admin
    public function updateAdminProfile( UpdateProfile $request, $id){
        $user = Admin::find($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->emergency_contact_number = $request->phone;
        $user->username = $request->username;

        if($request->avatar):
            if(Storage::exists($user->avatar)):
                Storage::delete($user->avatar);
            endif;
            $user->avatar = Storage::putFile('avatar', $request->file('avatar'));
        endif;

        if( $user->save() ):
            return back();
        endif;
    }

    //for provider
    public function updateProviderProfile(ProfileUpdate $request, $id){
        $user = Provider::find($id);
        $user = Provider::find($id);
        $user->first_name  = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->user_type = $request->user_type;
        $user->gender  = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone  = $request->phone;
        $user->username  = $request->username;

        if ($request->avatar) :
            if (Storage::exists($user->avatar)):
                Storage::delete($user->avatar);
            endif;
            $user->avatar = Storage::putFile('avatar', $request->file('avatar'));
        endif;

        if ($user->save()):
            return back();
        endif;
    }
}
