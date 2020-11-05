<?php

namespace App\Http\Controllers\Administration\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Property\Vehicle\Add;
use App\Http\Requests\Administration\Property\Vehicle\Update;
use App\Models\Billing;
use App\Models\Property;
use App\Models\PropertyRoom;
use App\Models\PropertyVehicle;
use App\Models\RoomBed;
use Illuminate\Http\Request;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    public function addVehicleView($id){
        $property = Property::find($id);
        return view('administration.modals.property.vehicle.add')->with('property',$property);
    }

    public function vehicleView($id){
        $vehicle = PropertyVehicle::find($id);
        return view('administration.modals.property.vehicle.view')->with('vehicle',$vehicle);
    }

    public function vehiclesTable($id){
        $vehicles = Property::find($id)->vehicles();
        return DataTables::make($vehicles)
            ->addColumn('vehicle_name',function(PropertyVehicle $vehicle){
                return $vehicle->model->manufacturer->name.' '.$vehicle->model->model_name.' '.$vehicle->model->model_year;
            })
            ->addColumn('vehicle_type',function(PropertyVehicle $vehicle){
                return $vehicle->model->vehicle_type->name;
            })
            ->addColumn('action',function(PropertyVehicle $vehicle){
                return "
                    <button class='btn btn-sm btn-primary' data-toggle='modal' data-target='#myModal' data-content='".route('app.modal.property.vehicle.view',$vehicle->id)."' data-hover='tooltip' data-original-title='View Vehicle'><i class='la la-eye'></i></button>
                    <button class='btn btn-sm btn-success' data-toggle='modal' data-target='#myModal' data-content='".route('app.modal.property.vehicle.billing.edit',$vehicle->id)."' data-hover='tooltip' data-original-title='Edit Billing'><i class='la la-dollar'></i></button>
                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".route('app.modal.property.vehicle.billing.delete',$vehicle->id)."' data-hover='tooltip' data-original-title='Delete Vehicle'><i class='la la-trash'></i></button>
                ";
            })
            ->toJson();
    }

    public function addVehicle($id,Add $request){
        $property = Property::find($id);
        $vehicle = new PropertyVehicle();

        $vehicle->property_id = $property->id;
        $vehicle->provider_id = $property->provider_id;
        $vehicle->total = $request->total;
        $vehicle->available = $request->total;
        $vehicle->booked = 0;
        $vehicle->description = $request->description;
        $vehicle->vehicle_model_id = $request->vehicle_model;

        if($vehicle->save()):
            $vehicle->refresh();
            $billings = [];

            foreach($request->get('price') as $billingType => $price):
                $billings[] = [
                    'property_id'=>$vehicle->property_id,
                    'item_id'=>$vehicle->id,
                    'item_type'=>get_class($vehicle),
                    'billing_type_id'=>$billingType,
                    'amount'=>$price,
                    'currency_id'=>$property->provider->currency_id,
                ];
            endforeach;

            Billing::insert($billings);

            return Notify::send('success','Vehicles Added Successfully.')->reload('table','VehiclesTable')->json();
        endif;

        return Notify::send('error','Can\'t Add Vehicles Now, Please Try Again Later.')->reload('table','VehiclesTable')->json();
    }

    public function editBillingView($id){
        $vehicle = PropertyVehicle::find($id);
        $property = Property::find($vehicle->property_id);

        return view('administration.modals.property.vehicle.edit',compact('vehicle','property'));
    }

    public function updateBillingView(Update $request, $id){
        
        $vehicle = PropertyVehicle::find($id);
        $property = Property::find($vehicle->property_id);

        $vehicle->property_id = $property->id;
        $vehicle->provider_id = $property->provider_id;
        $vehicle->total = $request->total;
        $vehicle->available = $request->total;
        $vehicle->booked = 0;
        $vehicle->description = $request->description;
        $vehicle->vehicle_model_id = $request->vehicle_model;

        if($vehicle->save()):
            $vehicle->refresh();
            $billings = [];

            $bill = Billing::where('item_id',$vehicle->id)->get();

            $i = 0;
            foreach($request->get('price') as $billingType => $price):
                $bill[$i]->property_id = $vehicle->property_id;
                $bill[$i]->item_id = $vehicle->id;
                $bill[$i]->item_type = get_class($vehicle);
                $bill[$i]->billing_type_id = $billingType;
                $bill[$i]->amount = $price;
                $bill[$i]->currency_id = $property->provider->currency_id;
                $bill[$i]->save();
                $i++;
            endforeach;

            return Notify::send('success','Vehicles updated Successfully.')->reload('table','VehiclesTable')->json();
        endif;

        return Notify::send('error','Can\'t update Vehicles Now, Please Try Again Later.')->reload('table','VehiclesTable')->json();

    }

    public function deleteBillingView($id){
        $vehicle = PropertyVehicle::find($id);
        $property = Property::find($vehicle->property_id);

        foreach( $vehicle->billings as $billing ):
            $billing->delete();
        endforeach;

        if($vehicle->delete()):
            return Notify::send('success','Vehicles deleted Successfully.')->reload('table','VehiclesTable')->json();
        endif;

    }
}
