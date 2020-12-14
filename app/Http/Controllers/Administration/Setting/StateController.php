<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Administration\Setting\State\Add;
use App\Http\Requests\Administration\Setting\State\Update;
use Illuminate\Support\Str;
use Library\Notify\Facades\Notify;

class StateController extends Controller
{
    public function state_list(){
        return view('administration.tabs.setting.state');
    }

    public function state_table(){

        $states = State::query();
        return DataTables::make($states->latest()->get())
            ->editColumn('country_id', function(State $state){
                return $state->country->name;
            })
            ->addColumn('action',function(State $state){
                return "
                        <button class='btn btn-sm btn-info' data-content='"
                    .route('app.modal.setting.state.edit',$state->id)."
                        ' data-hover='tooltip' data-original-title='Edit State'data-target='#myModal'
                        data-toggle='modal'><i class='la la-pencil'></i></button>

                        <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.modal.setting.state.delete',$state->id)."' data-hover='tooltip'
                        data-original-title='Delete State'><i class='la la-trash'></i></button>
                    ";
            })
            ->toJson();
    }

    public function view_add_modal(){
        return view('administration.modals.state.add');
    }

    public function add_state(Add $request){
        $state = new State();
        $state->name = $request->name;
        $state->country_id = $request->country_id;
        $state->slug = Str::slug($request->name);

        if( $state->save() ):
            return Notify::send('success','State Added Successfully')->reload('table','StateTable')->json();
        endif;
    }

    public function edit_state_modal($id){
        $state = State::find($id);
        return view('administration.modals.state.edit',compact('state'));
    }

    public function update_state(Update $request, $id){
        $state = State::find($id);

        $state->name = $request->name;
        $state->country_id = $request->country_id;
        $state->slug = Str::slug($request->name);

        if( $state->save() ):
            return Notify::send('success','State Updated Successfully')->reload('table','StateTable')->json();
        endif;
    }

    public function delete_state($id){
        $state = State::find($id);
        
        $cities = City::where('state_id', $id)->get();
        foreach($cities as $city){
            $city->delete();
        }

        if( $state->delete() ):
            return Notify::send('success','State Deleted Successfully')->reload('table','StateTable')->json();
        endif;
    }
}
