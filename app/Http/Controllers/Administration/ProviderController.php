<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;

class ProviderController extends Controller
{
    public function providerListView(){
        return view('administration.pages.provider.list');
    }

    public function editProviderView($id){

    }

    public function singleProviderView($id){

    }

    public function providersTable(){
        $providers = Provider::query();

        return DataTables::make($providers->latest()->get())
            ->rawColumns(['is_active','action'])
            ->editColumn('is_active',function(Provider $provider){
                return "<input type='checkbox' class='switchBootstrap' data-action='changeStatus' data-on-color='success' data-off-color='danger' data-on-text='<i class=\"ft-check\"></i>' data-off-text='<i class=\"ft-x\"></i>' ".($provider->is_active ? 'checked' : '')." data-action-route='".route('app.provider.switch.status',$provider->id)."'/>";
            })
            ->addColumn('action',function(Provider $provider){
                return "
                    <button class='btn btn-sm btn-primary'data-content='"
                    .route('app.booking.view',$provider->id)."
                    'data-hover='tooltip' data-original-title='View Room'><i class='la la-eye'></i></button>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.booking.delete',$provider->id)."' data-hover='tooltip'
                    data-original-title='Delete Room'><i class='la la-trash'></i></button>
                ";
            })
            ->toJson();
    }

    public function switchActivationStatus($id){
        $provider = Provider::findOrFail($id);

        $provider->is_active = $provider->is_active ? false : true;
        if($provider->save()):
            return Notify::send('success','Provider '.($provider->is_active ? 'Activated' : 'Deactivated').' Successfully')->reload('table','ProvidersTable')->json();
        endif;

        return Notify::send('error','Can\'t '.($provider->is_active ? 'Activate' : 'Deactivate').' Provider Now, Please Try Again')->reload('table','ProvidersTable')->json();
    }
}
