<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Provider;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function customerListView(){
        return view('administration.pages.customer.list');
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
                    <button class='btn btn-sm btn-primary'data-content='"
                    .route('app.booking.view',$customers->id)."
                    'data-hover='tooltip' data-original-title='View Room'><i class='la la-eye'></i></button>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.booking.delete',$customers->id)."' data-hover='tooltip'
                    data-original-title='Delete Room'><i class='la la-trash'></i></button>
                ";
            })
            ->toJson();
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
