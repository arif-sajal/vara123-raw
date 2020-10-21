<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Provider\Add;
use App\Http\Requests\Administration\Provider\Reset;
use App\Http\Requests\Administration\Provider\Update;
use App\Models\Provider;
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
