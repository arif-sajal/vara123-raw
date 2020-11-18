<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Administration\Setting\City\Add;
use App\Http\Requests\Administration\Setting\City\Update;
use Illuminate\Support\Str;
use Library\Notify\Facades\Notify;

class CityController extends Controller
{
    public function city_list(){
        return view('administration.tabs.setting.city');
    }

    public function city_table(){

        $cities = City::query();
        return DataTables::make($cities->latest()->get())
            ->editColumn('country_id', function(City $city){
                return $city->country->name;
            })
            ->editColumn('state_id', function(City $city){
                return $city->state->name;
            })
            ->addColumn('action',function(City $city){
                return "
                        <button class='btn btn-sm btn-info' data-content='"
                    .route('app.modal.setting.city.edit',$city->id)."
                        ' data-hover='tooltip' data-original-title='Edit City'data-target='#myModal'
                        data-toggle='modal'><i class='la la-pencil'></i></button>

                        <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.modal.setting.city.delete',$city->id)."' data-hover='tooltip'
                        data-original-title='Delete City'><i class='la la-trash'></i></button>
                    ";
            })
            ->toJson();
    }

    public function view_add_modal(){
        return view('administration.modals.city.add');
    }

    public function add_city(Add $request){
        $city = new City();

        $city->country_id = $request->country_id;
        $city->state_id = $request->state_id;
        $city->name = $request->name;
        $city->slug = Str::slug($request->name);

        if( $city->save() ):
            return Notify::send('success',"City Added Successfully")->reload('table','CityTable')->json();
        endif;
    }

    public function edit_city_modal($id){
        $city = City::find($id);
        return view('administration.modals.city.edit', compact('city'));
    }

    public function update_city(Update $request, $id){
        $city = City::find($id);

        $city->country_id = $request->country_id;
        $city->state_id = $request->state_id;
        $city->name = $request->name;
        $city->slug = Str::slug($request->name);

        if( $city->save() ):
            return Notify::send('success',"City Updated Successfully")->reload('table','CityTable')->json();
        endif;
    }

    public function delete_city($id){
        $city = City::find($id);

        if( $city->delete() ):
            return Notify::send('success',"City Removed")->reload('table','CityTable')->json();
        endif;
    }
}
