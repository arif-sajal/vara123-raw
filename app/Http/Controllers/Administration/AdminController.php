<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Admin\Add;
use App\Http\Requests\Administration\Admin\Reset;
use App\Http\Requests\Administration\Admin\Update;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function adminListView(){
        return view('administration.pages.admin.list');
    }

    public function viewAddAdminModal(){
        return view('administration.modals.admin.add');
    }

    public function viewEditAdminModal($id){
        $admin = Admin::find($id);
        return view('administration.modals.admin.edit')->with('admin', $admin);
    }

    public function editProfile($id){
        $user = Admin::find($id);
        return view('administration.modals.admin.editProfile')->with('user', $user);
    }

    public function adminsTable(){
        $admins = Admin::query();

        return DataTables::make($admins->latest()->get())
            ->rawColumns(['is_active','action'])
            ->editColumn('is_active',function(Admin $admins){
                return "<input type='checkbox' class='switchBootstrap' data-action='changeStatus' data-on-color='success' data-off-color='danger' data-on-text='<i class=\"ft-check\"></i>' data-off-text='<i class=\"ft-x\"></i>' ".($admins->is_active ? 'checked' : '')." data-action-route='".route('app.admin.switch.status',$admins->id)."'/>";
            })
            ->addColumn('action',function(Admin $admins){
                return "
                    <button class='btn btn-sm btn-info'data-content='"
                    .route('app.modal.admin.edit',$admins->id)."
                    'data-hover='tooltip' data-original-title='Edit Admin' data-toggle='modal' data-target='#myModal' data-content=''><i class='la la-pencil'></i></button>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.form.submission.admin.delete',$admins->id)."' data-hover='tooltip'
                    data-original-title='Delete admin'><i class='la la-trash' data-action='confirm' data-action-route=''></i></button>

                    <button class='btn btn-sm btn-primary'data-content='"
                    .route('app.modal.admin.resetpassword',$admins->id)."
                    'data-hover='tooltip' data-original-title='Reset Password' data-toggle='modal' data-target='#myModal' data-content=''><i class='la la-lock'></i></button>
                ";
            })
            ->toJson();
    }

    public function addAdmin(Add $request){

        $admin = new Admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->gender = $request->gender;
        $admin->date_of_birth = $request->date_of_birth;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->emergency_contact_number = $request->phone;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);

        if($request->hasFile('avatar')):
            $admin->avatar = Storage::putFile('avatar', $request->file('avatar'));
        endif;

        if( $admin->save() ):
            return Notify::send('success', 'Admin added successfully')->reload('table','AdminsTable')->json();
        endif;

        return Notify::send('warning', 'Password didn\'t match.')->json();
    }

    public function updateAdmin(Update $request,$id){
        $admin = Admin::find($id);
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->gender = $request->gender;
        $admin->date_of_birth = $request->date_of_birth;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->emergency_contact_number = $request->phone;
        $admin->username = $request->username;

        if($request->image):
            if(Storage::exists($admin->avatar)):
                Storage::delete($admin->avatar);
            endif;
            $admin->avatar = Storage::putFile('avatar', $request->file('image'));
        endif;

        if( $admin->save() ):
            return Notify::send('success', 'Admin updated successfully')->reload('table','AdminsTable')->json();
        endif;

    }

    public function deleteAdmin($id){
        $admins =  Admin::find($id);
        if( Storage::exists($admins->avatar) ):
            Storage::delete($admins->avatar);
            $admins->avatar = NULL;
        endif;
        if( $admins->delete() ) :
            return Notify::send('success', 'Admin deleted successfully')->reload('table','AdminsTable')->json();
        endif;
    }

    public function adminPasswordReset(Admin $admins){
        return view('administration.modals.admin.resetPassword', compact('admins'));
    }

    public function reset(Reset $request, $id){
        $admin = Admin::find($id);

        if( $request->password == $request->password_confirmation ):
            $admin->password = Hash::make($request->password);
            if($admin->save()):
                return Notify::send('success', 'Password reset successfully')->reload('table','AdminsTable')->json();
            endif;
        else:
            return Notify::send('warning', 'Password didn\'t match')->reload('table','AdminsTable')->json();
        endif;
    }

    public function switchActivationStatus($id){
        $admin = Admin::findOrFail($id);

        $admin->is_active = $admin->is_active ? false : true;
        if($admin->save()):
            return Notify::send('success','Admin '.($admin->is_active ? 'Activated' : 'Deactivated').' Successfully')->reload('table','AdminsTable')->json();
        endif;

        return Notify::send('error','Can\'t '.($admin->is_active ? 'Activate' : 'Deactivate').' Admin Now, Please Try Again')->reload('table','AdminsTable')->json();
    }
}
