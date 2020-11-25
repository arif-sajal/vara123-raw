<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Provider\Add;
use App\Http\Requests\Administration\Provider\DuePay;
use App\Http\Requests\Administration\Provider\Reset;
use App\Http\Requests\Administration\Provider\Update;
use App\Models\DueAmountTransaction;
use App\Http\Resources\Front\DueAmountResource;
use App\Models\Provider;
use Library\Api\Facades\Api;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;


class ProviderController extends Controller
{
    public function providerListView()
    {
        return view('administration.pages.provider.list');
    }
    public function viewEditModal(Provider $provider)
    {
        return view('administration.modals.provider.edit', compact('provider'));
    }

    public function editProfile($id){
        $user = Provider::find($id);
        return view('administration.modals.provider.editProfile')->with('user', $user);
    }

    public function providersTable()
    {
        $providers = Provider::query();

        return DataTables::make($providers->latest()->get())
            ->rawColumns(['is_active', 'action'])
            ->editColumn('is_active', function (Provider $provider) {
                return "<input type='checkbox' class='switchBootstrap' data-action='changeStatus' data-on-color='success' data-off-color='danger' data-on-text='<i class=\"ft-check\"></i>' data-off-text='<i class=\"ft-x\"></i>' " . ($provider->is_active ? 'checked' : '') . " data-action-route='" . route('app.provider.switch.status', $provider->id) . "'/>";
            })
            ->addColumn('action', function (Provider $provider) {
                return "
                    <button class='btn btn-sm btn-primary'data-content='"
                    . route('app.modal.provider.edit', $provider->id) . "
                    'data-hover='tooltip' data-toggle='modal' data-target='#myModal' data-original-title='Edit provider'><i class='la la-edit'></i></button>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='" .
                    route('app.form.submission.provider.delete', $provider->id) . "' data-hover='tooltip'
                    data-original-title='Delete Room'><i class='la la-trash'></i></button>

                    <button class='btn btn-sm btn-info'data-content='"
                    . route('app.modal.provider.resetpassword', $provider->id) . "
                    'data-hover='tooltip' data-toggle='modal' data-target='#myModal' data-original-title='Reset Password'><i class='la la-lock'></i></button>
                ";
            })
            ->toJson();
    }

    public function viewAddModal()
    {
        return view('administration.modals.provider.add');
    }
    public function addProvider(Add $request)
    {

        if ($request->password == $request->password_confirmation) :
            $provider = new Provider();
            $provider->first_name = $request->first_name;
            $provider->last_name = $request->last_name;
            $provider->user_type = $request->user_type;
            $provider->gender = $request->gender;
            $provider->date_of_birth = $request->date_of_birth;
            $provider->email = $request->email;
            $provider->phone  = $request->phone;
            $provider->address = $request->address;
            $provider->username  = $request->username;
            $provider->password = Hash::make($request->password);
            if ($request->image) :
                $provider->avatar = Storage::putFile('avatar', $request->file('image'));
            endif;
            if ($provider->save()) :
                return Notify::send('success', 'Provider added successfully')->reload('table', 'ProvidersTable')->json();
            endif;
        else:
            return Notify::send('warning', 'Password didn\'t matched')->reload('table', 'ProvidersTable')->json();
        endif;
    }

    public function updateProvider(Update $request, $id)
    {
        $provider = Provider::find($id);
        $provider->first_name  = $request->first_name;
        $provider->last_name  = $request->last_name;
        $provider->user_type = $request->user_type;
        $provider->gender  = $request->gender;
        $provider->date_of_birth = $request->date_of_birth;
        $provider->email = $request->email;
        $provider->address = $request->address;
        $provider->phone  = $request->phone;
        $provider->username  = $request->username;

        if ($request->image) :
            if (Storage::exists($provider->avatar)):
                Storage::delete($provider->avatar);
            endif;
            $provider->avatar = Storage::putFile('avatar', $request->file('image'));
        endif;

        if ($provider->save()):
            return Notify::send('success', 'Provider updated successfully')->reload('table', 'ProvidersTable')->json();
        endif;
    }

    public function deleteProvider($id)
    {
        $provider = Provider::find($id);
        
        foreach( $provider->property_vehicle as $single_vehicle ):
            $single_vehicle->delete();
        endforeach;

        foreach( $provider->property_spot as $single_spot ):
            $single_spot->delete();
        endforeach;

        foreach( $provider->property_room as $single_room ):
            $single_room->delete();
        endforeach;

        foreach( $provider->property as $single_property ):
            $single_property->delete();
            foreach( $single_property->property_amenities as $single_amenities ):
                $single_amenities->delete();
            endforeach;
        endforeach;

        foreach( $provider->payout as $single_payout ):
            $single_payout->delete();
        endforeach;

        foreach( $provider->booking as $single_booking ):
            $single_booking->delete();
            $single_booking->transaction->delete();
        endforeach;

        if (Storage::exists($provider->avatar)):
            Storage::delete($provider->avatar);
        endif;

        if ($provider->delete()):
            return Notify::send('success', 'Provider deleted successfully')->reload('table', 'ProvidersTable')->json();
        endif;
    }

    public function providerPasswordReset(Provider $provider)
    {
        return view('administration.modals.provider.resetPassword', compact('provider'));
    }

    public function reset(Reset $request, $id)
    {
        $provider = Provider::find($id);

        if ($request->password == $request->password_confirmation):
            $provider->password  = Hash::make($request->password);
            if ($provider->save()):
                return Notify::send('success', 'Password reset successfully')->reload('table', 'ProvidersTable')->json();
            endif;
        else:
            return Notify::send('warning', 'Password didn\'t matched')->json();
        endif;
    }


    public function dueModal($id){
        $provider = Provider::find($id);
        return view('administration.modals.provider.dueModal', compact('provider'));
    }

    public function duePay(DuePay $request, $id){
        
        $provider = Provider::find($id);
        if( $provider->due_balance >= $request->amount ):
            return $this->payWithSSLCommerz($request, $provider);
        else:
            return Notify::send('warning','Insufficient Amount')->json();
        endif;
        
    }

    public function payWithSSLCommerz(DuePay $request, $provider){
       
        $transaction = new DueAmountTransaction();
        $transaction->amount = $request['amount'];
        $transaction->provider_id = $provider['id'];
        $transaction->save();

        $post_data = [
            'store_id'=> 'perso5f9cfe76d402b',
            'store_passwd'=> 'perso5f9cfe76d402b@ssl',
            'total_amount'=> $request->amount,
            'tran_id' => $transaction->refresh()->id,
            'currency' => 'BDT',
            'product_category' => 'Due Amount Pay',
            'success_url' => 'http://127.0.0.1:8000/sslcommerz/success',
            'fail_url' => 'http://127.0.0.1:8000/sslcommerz/fail',
            'cancel_url' => 'http://127.0.0.1:8000/sslcommerz/cancel',
            'ipn_url' => 'http://127.0.0.1:8000/sslcommerz/ipn',
            'emi_option' => 0,
            'cus_name' => $provider->first_name,
            'cus_email' => $provider->email,
            'cus_city' => $provider->address,
            'cus_country' => $provider->address,
            'cus_add1' => $provider->address,
            'cus_phone' => $provider->phone,
            'shipping_method' => 'NO',
            'num_of_item' => 1,
            'product_name' => "Due Amount Pay",
            'product_profile' => 'non-physical-goods',
            'value_a' => $provider->id,
        ];

        $client = new Client();
        $response = $client->post('https://sandbox.sslcommerz.com/gwprocess/v4/api.php', ['form_params'=>$post_data, 'verify'=>false])->getBody();

        $transaction->payment_initiation_server_response = $response->getContents();
        $transaction->save();

        return $transaction->payment_initiation_server_response;

        // return Api::data(DueAmountResource::make($transaction->refresh()))->send();

    }


    public function sslcomemrzSuccess(Request $request){

        $transaction = DueAmountTransaction::find($request->get('tran_id'));
        $transaction->payment_validation_server_response = $request->all();
        $transaction->is_payment_done = true;
        
        if( $transaction->save() ):
            $transaction->provider->decrement('due_balance', $transaction->amount);
            return redirect('http://127.0.0.1:8000/profile/'. $transaction->provider_id)->with('sslSuccess','Payment complete');
        endif;
    }

    public function sslcomemrzFailed(Request $request){
        $transaction = DueAmountTransaction::find($request->get('tran_id'));
        $transaction->payment_validation_server_response = $request->all();

        if( $transaction->save() ):
            return redirect('http://127.0.0.1:8000/profile/'. $transaction->provider_id)->with('sslFailed','Payment Failed');
        endif;
    }

    public function sslcomemrzCanceled(Request $request){
        $transaction = DueAmountTransaction::find($request->get('tran_id'));
        $transaction->payment_validation_server_response = $request->all();

        if( $transaction->save() ):
            return redirect('http://127.0.0.1:8000/profile/'. $transaction->provider_id)->with('sslCancel','Payment Cancelled');
        endif;
    }

    public function sslcomemrzIpnValidation(Request $request){
        $transaction = DueAmountTransaction::find($request->get('tran_id'));
        $transaction->payment_validation_server_response = $request->all();
        $transaction->status = $request->get('status');
        $transaction->is_payment_done = true;
        $transaction->paid_by = 'Online Payment';
        if( $transaction->save() ):
            return redirect('http://127.0.0.1:8000/profile/'. $transaction->provider_id)->with('sslIpnValidation','Ipn validation done');
        endif;
    }


    public function switchActivationStatus($id)
    {
        $provider = Provider::findOrFail($id);

        $provider->is_active = $provider->is_active ? false : true;
        if ($provider->save()) :
            return Notify::send('success', 'Provider ' . ($provider->is_active ? 'Activated' : 'Deactivated') . ' Successfully')->reload('table', 'ProvidersTable')->json();
        endif;

        return Notify::send('error', 'Can\'t ' . ($provider->is_active ? 'Activate' : 'Deactivate') . ' Provider Now, Please Try Again')->reload('table', 'ProvidersTable')->json();
    }

}
