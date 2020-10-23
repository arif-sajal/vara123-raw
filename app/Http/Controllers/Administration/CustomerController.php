<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\Administration\Customer\Add;
use App\Models\Provider;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Administration\Customer\Update;
use App\Http\Requests\Administration\Customer\Reset;

class CustomerController extends Controller
{
    public function customerListView(){
        return view('administration.pages.customer.list');
    }
    public function viewAddCustomerModal(){
        return view('administration.modals.customer.add');
    }

    public function customersTable(){
        $customers = Customer::query();

        return DataTables::make($customers->latest()->get())
            ->rawColumns(['is_active','action'])
            ->editColumn('is_active',function(Customer $customers){
                return "<input type='checkbox' class='switchBootstrap' data-action='changeStatus' data-on-color='success' data-off-color='danger' data-on-text='<i class=\"ft-check\"></i>' data-off-text='<i class=\"ft-x\"></i>' ".($customers->is_active ? 'checked' : '')." data-action-route='".route('app.customer.switch.status',$customers->id)."'/>";
            })
            ->addColumn('action',function(Customer $customers){
                return "
                <button class='btn btn-sm btn-success'data-content='"
                .route('app.modal.customer.view',$customers->id)."
                'data-hover='tooltip' data-original-title='Quick View' data-toggle='modal' data-target='#myModal' data-content=''><i class='la la-eye'></i></button>

                <button class='btn btn-sm btn-info'data-content='"
                .route('app.modal.customer.edit',$customers->id)."
                'data-hover='tooltip' data-original-title='Edit Admin' data-toggle='modal' data-target='#myModal' data-content=''><i class='la la-pencil'></i></button>

                <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                route('app.form.submission.customer.delete',$customers->id)."' data-hover='tooltip'
                data-original-title='Delete Room'><i class='la la-trash'></i></button>

                <button class='btn btn-sm btn-primary'data-content='"
                .route('app.modal.customer.resetpassword',$customers->id)."
                'data-hover='tooltip' data-original-title='Reset Password' data-toggle='modal' data-target='#myModal' data-content=''><i class='la la-lock'></i></button>


                ";
            })
            ->toJson();
    }

    public function addCustomer(Add $request){

        if( $request->password == $request->password_confirmation ):
            $customer = new Customer();
            $customer->first_name  = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->address = $request->address;
            $customer->country = $request->country;
            $customer->state  = $request->state;
            $customer->city  = $request->city;
            $customer->post_code = $request->p_code;
            $customer->gender  = $request->gender;
            $customer->date_of_birth  = $request->date_of_birth;
            $customer->email = $request->email;
            $customer->phone  = $request->phone;
            $customer->nid_number  = $request->nid_number;
            $customer->birth_certificate_number = $request->birth_certificate_number;
            $customer->passport_number = $request->passport_number;
            $customer->emergency_contact_number = $request->e_contact_number;
            $customer->username  = $request->username;
            $customer->password   = Hash::make($request->password);

            if( $request->image ):
                $customer->avatar = Storage::putFile('avatar', $request->file('image'));
            endif;
            if( $customer->save() ) :
                return Notify::send('success','Customer added successfully')->reload('table','CustomersTable')->json();
            endif;
        else:
            return Notify::send('warning','Password didn\'t matched')->json();
        endif;
    }

    public function viewCustomerModal(Customer $customers){
        return view('administration.modals.customer.view', compact('customers'));
    }

    public function editCustomerModal(Customer $customers){
        return view('administration.modals.customer.edit', compact('customers'));
    }

    public function updateCustomer(Update $request, $id){
        $customer = Customer::find($id);
        $customer->first_name  = $request->first_name;
        $customer->last_name  = $request->last_name;
        $customer->address  = $request->address;
        $customer->country  = $request->country;
        $customer->state  = $request->state;
        $customer->city   = $request->city;
        $customer->post_code  = $request->p_code;
        $customer->gender  = $request->gender;
        $customer->date_of_birth = $request->date_of_birth;
        $customer->username  = $request->username;
        $customer->email  = $request->email;
        $customer->phone = $request->phone;
        $customer->nid_number  = $request->nid_number;
        $customer->birth_certificate_number = $request->birth_certificate_number;
        $customer->passport_number   = $request->passport_number;
        $customer->emergency_contact_number  = $request->e_contact_number;

        if(  $request->image ):
            if( Storage::exists($customer->avatar ) ):
                Storage::delete($customer->avatar);
            endif;
            $customer->avatar = Storage::putFile('avatar', $request->file('image'));
        endif;

        if( $customer->save() ) :
            return Notify::send('success','Customer updated successfully')->reload('table','CustomersTable')->json();
        endif;
    }
    public function deleteCustomer($id){
        $customer = Customer::find($id);
        if( Storage::exists($customer->avatar ) ):
            Storage::delete($customer->avatar);
        endif;
        if( $customer->delete() ):
            return Notify::send('success','Customer deleted successfully')->reload('table','CustomersTable')->json();
        endif;
    }

    public function customerResetPassword(Customer $customers){
        return view('administration.modals.customer.resetPassword', compact('customers'));
    }

    public function customerPasswordReset( Reset $request ,$id){
        $customer = Customer::find($id);

        if( $request->password == $request->password_confirmation ):
            $customer->password  = Hash::make($request->password);
            if( $customer->save() ):
                return Notify::send('success','Password reset successfully')->reload('table','CustomersTable')->json();
            endif;
        else:
            return Notify::send('warning','Password didn\'t matched')->json();
        endif;
    }



    public function switchActivationStatus($id){
        $customer = Customer::findOrFail($id);

        $customer->is_active = $customer->is_active ? false : true;
        if($customer->save()):
            return Notify::send('success','Customer '.($customer->is_active ? 'Activated' : 'Deactivated').' Successfully')->reload('table','CustomersTable')->json();
        endif;

        return Notify::send('error','Can\'t '.($customer->is_active ? 'Activate' : 'Deactivate').' Customer Now, Please Try Again')->reload('table','CustomersTable')->json();
    }
}
