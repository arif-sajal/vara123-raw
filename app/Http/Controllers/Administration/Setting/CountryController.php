<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Administration\Setting\Country\Add;
use App\Http\Requests\Administration\Setting\Country\Update;
use Illuminate\Support\Str;
use Library\Notify\Facades\Notify;

class CountryController extends Controller
{
    public function country_list(){
        return view('administration.tabs.setting.country');
    }

    public function country_table(){

        $countries = Country::query();
        return DataTables::make($countries->latest()->get())
            ->addColumn('action',function(Country $country){
                return "
                        <button class='btn btn-sm btn-info' data-content='"
                    .route('app.modal.setting.country.edit',$country->id)."
                        ' data-hover='tooltip' data-original-title='Edit Country'data-target='#myModal'
                        data-toggle='modal'><i class='la la-pencil'></i></button>

                        <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.modal.setting.country.delete',$country->id)."' data-hover='tooltip'
                        data-original-title='Delete Country'><i class='la la-trash'></i></button>
                    ";
            })
            ->toJson();
    }

    public function view_add_modal(){
        return view('administration.modals.country.add');
    }

    public function add_country(Add $request){
        $country = new Country();
        $country->name = $request->name;
        $country->slug = Str::slug($request->name);

        if( $country->save() ):
            return Notify::send('success','Country Added Successfully')->reload('table','CountryTable')->json();
        endif;
    }

    public function edit_country_modal($id){
        $country = Country::find($id);
        return view('administration.modals.country.edit',compact('country'));
    }

    public function update_country(Update $request, $id){
        $country = Country::find($id);

        $country->name = $request->name;
        $country->slug = Str::slug($request->name);

        if( $country->save() ):
            return Notify::send('success','Country Updated Successfully')->reload('table','CountryTable')->json();
        endif;
    }

    public function delete_country($id){
        $country = Country::find($id);

        if( $country->delete() ):
            return Notify::send('success','Country Deleted Successfully')->reload('table','CountryTable')->json();
        endif;
    }
}
