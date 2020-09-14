<?php

namespace App\Http\Controllers\Administration\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Property\Room\Add;
use App\Http\Requests\Administration\Property\Room\EditBilling;
use App\Models\Billing;
use App\Models\Property;
use App\Models\PropertyRoom;
use App\Models\RoomBed;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;

class RoomController extends Controller
{
    public function addRoomView($id){
        $property = Property::find($id);
        return view('administration.modals.property.room.add')->with('property',$property);
    }

    public function roomView($id){
        $room = PropertyRoom::find($id);
        return view('administration.modals.property.room.view')->with('room',$room);
    }

    public function editBillingView($id){
        $room = PropertyRoom::find($id);
        return view('administration.modals.property.room.billing')->with('room',$room);
    }

    public function roomsTable($id){
        $rooms = Property::find($id)->rooms();
        return DataTables::make($rooms)
            ->editColumn('for_person',function(PropertyRoom $room){
                return $room->for_person.' Person';
            })
            ->addColumn('action',function(PropertyRoom $room){
                return "
                    <button class='btn btn-sm btn-primary' data-toggle='modal' data-target='#myModal' data-content='".route('app.modal.property.room.view',$room->id)."' data-hover='tooltip' data-original-title='View Room'><i class='la la-eye'></i></button>
                    <button class='btn btn-sm btn-success' data-toggle='modal' data-target='#myModal' data-content='".route('app.modal.property.room.billing.edit',$room->id)."' data-hover='tooltip' data-original-title='Edit Billing'><i class='la la-dollar'></i></button>
                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".route('app.form.submission.property.room.delete',$room->id)."' data-hover='tooltip' data-original-title='Delete Room'><i class='la la-trash'></i></button>
                ";
            })
            ->toJson();
    }

    public function addRoom(Add $request,$id){
        $property = Property::find($id);
        $room = new PropertyRoom();

        $room->property_id = $property->id;
        $room->provider_id = $property->provider_id;
        $room->total = $request->total;
        $room->available = $request->total;
        $room->booked = 0;
        $room->description = $request->description;
        $room->for_person = $request->forPersonCount();
        $room->bed_count = count($request->beds);
        $room->room_type = $request->room_type;

        if($room->save()):
            $room->refresh();
            $beds = [];
            #billings = [];
            foreach($request->get('beds') as $bed):
                $beds[] = [
                    'room_id'=>$room->id,
                    'property_id'=>$room->property_id,
                    'provider_id'=>$room->provider_id,
                    'size'=>$bed['bed_type'],
                    'for_person'=>$bed['for_person'],
                ];
            endforeach;

            foreach($request->get('price') as $billingType => $price):
                $billings[] = [
                    'property_id'=>$room->property_id,
                    'item_id'=>$room->id,
                    'item_type'=>get_class($room),
                    'billing_type_id'=>$billingType,
                    'amount'=>$price,
                    'currency_id'=>$property->provider->currency_id,
                ];
            endforeach;

            RoomBed::insert($beds);
            Billing::insert($billings);

            return Notify::send('success','Room Added Successfully.')->reload('table','RoomsTable')->json();
        endif;

        return Notify::send('error','Can\'t Add Room Now, Please Try Again Later.')->reload('table','RoomsTable')->json();
    }

    public function deleteRoom($id){
        $room = PropertyRoom::find($id);

        if($room->delete()):
            return Notify::send('success','Room Deleted Successfully.')->reload('table','RoomsTable')->json();
        endif;

        return Notify::send('error','Can\'t Delete Room Now, Please Try Again Later.')->reload('table','RoomsTable')->json();
    }

    public function editRoomBilling(EditBilling $request){
        $bills = $request->get('price');
        foreach($bills as $id => $bill):
            $billing = Billing::find($id);
            $billing->amount = $bill;
            if(!$billing->save()):
                return Notify::send('error','Can\'t Update Billing, Please Try Again')->json();
            endif;
        endforeach;
        return Notify::send('success','Billing Updated Successfully.')->json();
    }
}
