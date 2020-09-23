<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function adminListView(){
        return view('administration.pages.admin.list');
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
                    <button class='btn btn-sm btn-primary'data-content='"
                    .route('app.booking.view',$admins->id)."
                    'data-hover='tooltip' data-original-title='View Room'><i class='la la-eye'></i></button>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.booking.delete',$admins->id)."' data-hover='tooltip'
                    data-original-title='Delete Room'><i class='la la-trash'></i></button>
                ";
            })
            ->toJson();
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
