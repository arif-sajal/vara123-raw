<?php

namespace App\Http\Controllers\Administration\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Timing;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Administration\Property\Time\Add;
use App\Http\Requests\Administration\Property\Time\Update;
use Library\Notify\Facades\Notify;

class TimeController extends Controller
{
    public function timeTable($id){
        $timing = Timing::where('property_id', $id)->get();
        return DataTables::make($timing)
            ->editColumn('property_id', function(Timing $time){
                return $time->property->name;
            })
            ->editColumn('opening', function(Timing $time){
                return $time->opening->toTimeString();
            })
            ->editColumn('closing', function(Timing $time){
                return $time->closing->toTimeString();
            })
            ->addColumn('action', function (Timing $time) {
                return "
                <button class='btn btn-sm btn-success' data-toggle='modal' data-target='#myModal' data-content='" . route('app.modal.property.timing.edit', $time->id) . "' data-hover='tooltip' data-original-title='Edit Timing'><i class='la la-dollar'></i></button>
                    <button class='btn btn-sm btn-danger' data-action='confirm'
                     data-action-route='" . route('app.form.submission.property.timing.delete', $time->id) .
                    "' data-hover='tooltip' data-original-title='Delete Timing'><i class='la la-trash'>
                      </i></button>
                ";
            })
            ->toJson();
    }

    public function addTimeView($id){
        $property = Property::find($id);
        return view('administration.modals.property.time.add',compact('property'));
    }

    public function addTime(Add $request, $id){
        $property = Property::find($id);

        $timing = new Timing();
        
        $timing->property_id = $property->id;
        $timing->day_name = $request->day_name;
        $timing->day_number = $request->day_number;
        $timing->opening = $request->opening;
        $timing->closing = $request->closing;
        $timing->is_off_day = $request->is_off_day;

        if($timing->save()):
            return Notify::Send('success','Timing Added Successfully')->reload('table','TimeTable')->json();
        endif;
    }

    public function editTimeView($id){
        $timing = Timing::find($id);
        return view('administration.modals.property.time.edit',compact('timing'));
    }

    public function updateTime(Update $request, $id){
        $timing = Timing::find($id);

        $timing->day_name = $request->day_name;
        $timing->day_number = $request->day_number;
        $timing->opening = $request->opening;
        $timing->closing = $request->closing;
        $timing->is_off_day = $request->is_off_day;

        if($timing->save()):
            return Notify::Send('success','Timing Updated Successfully')->reload('table','TimeTable')->json();
        endif;
    }

    public function deleteTime($id){
        $timing = Timing::find($id);
        if($timing->delete()):
            return Notify::Send('success','Timing deleted Successfully')->reload('table','TimeTable')->json();
        endif;
    }
}
