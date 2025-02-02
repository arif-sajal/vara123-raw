<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Property\Add;
use App\Http\Requests\Administration\Property\Edit;
use App\Models\Amenity;
use App\Models\City;
use App\Models\Day;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\Timing;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Library\Notify\Facades\Notify;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public $tabs = [
        'Amenities', 'Gallery', 'Timings', 
    ];

    public $property_type = [
        'All','Accomodation', 'Parking_Lot', 'Vehicle_rental'
    ];

    public function propertyListView()
    {
        $properties = Property::query();

        if (auth('provider')->check()) :
            $properties->where('provider_id', auth('provider')->id());
        endif;
        return view('administration.pages.property.list', ['properties' => $properties->paginate(15)])->with('property_type', $this->property_type);
    }

    public function singlePropertyView($propertyID)
    {
        $property = Property::findorFail($propertyID);
        return view('administration.pages.property.single', compact('property'))->with('tabs', $this->tabs);
    }

    public function allPropertyList(){
        $properties = Property::query();

        if (auth('provider')->check()) :
            $properties->where('provider_id', auth('provider')->id());
        endif;
        return view('administration.pages.property.list', ['properties' => $properties->paginate(15)])->with('property_type', $this->property_type);
    }


    public function getTab($type, $id)
    {
        $property = Property::find($id);
        if ($type === 'accommodation') :
            return view('administration.tabs.property.rooms')->with('property', $property);
        elseif ($type === 'parking_lot') :
            return view('administration.tabs.property.spots')->with('property', $property);
        elseif ($type === 'vehicle_rental') :
            return view('administration.tabs.property.vehicles')->with('property', $property);
        elseif ($type === 'amenities') :
            return view('administration.tabs.property.amenities')->with('property', $property);
        elseif ($type === 'gallery') :
            return view('administration.tabs.property.gallery')->with('property', $property);
        elseif ($type === 'timings') :
            return view('administration.tabs.property.timing')->with('property', $property);
        endif;
        
    }

    public function getPropertyTab($type){
        if ($type === 'all') :
            $properties = Property::all();

            if (auth('provider')->check()):
                $properties = Property::where('provider_id', auth('provider')->user()->id)->get();
                return view('administration.tabs.property.all_list', compact('properties'))->with('property_type', $this->property_type);
            endif;
            return view('administration.tabs.property.all_list', compact('properties'))->with('property_type', $this->property_type);

        elseif ($type === 'accomodation') :
            $properties = Property::where('property_type_id',1)->get();

            if (auth('provider')->check()):
                $properties = Property::where('provider_id', auth('provider')->user()->id)->where('property_type_id',1)->get();
                return view('administration.tabs.property.acomodation_list', compact('properties'))->with('property_type', $this->property_type);
            endif;
            return view('administration.tabs.property.acomodation_list', compact('properties'))->with('property_type', $this->property_type);

        elseif ($type === 'parking_lot') :
            $properties = Property::where('property_type_id',2)->get();

            if (auth('provider')->check()):
                $properties = Property::where('provider_id', auth('provider')->user()->id)->where('property_type_id',2)->get();
                return view('administration.tabs.property.parking_lot', compact('properties'))->with('property_type', $this->property_type);
            endif;
            return view('administration.tabs.property.parking_lot', compact('properties'))->with('property_type', $this->property_type);
        elseif ($type === 'vehicle_rental') :
            $properties = Property::where('property_type_id',3)->get();

            if (auth('provider')->check()):
                $properties = Property::where('provider_id', auth('provider')->user()->id)->where('property_type_id',3)->get();
                return view('administration.tabs.property.vehicle_rental', compact('properties'))->with('property_type', $this->property_type);
            endif;
            return view('administration.tabs.property.vehicle_rental',compact('properties'))->with('property_type', $this->property_type);
        endif;
    }

    public function addPropertyView()
    {
        return view('administration.pages.property.add');
    }

    public function editPropertyView($id)
    {
        $property = Property::find($id);
        return view('administration.pages.property.edit')->with('property', $property);
    }

    public function dynamicdependent($id)
    {
        if( auth('provider')->check() ):
            return $states = DB::table("amenities")->where("property_type_id", $id)->where('provider_id', auth('provider')->user()->id )->pluck("name", "id");
        endif;

        return $states = DB::table("amenities")->where("property_type_id", $id)->pluck("name", "id");

    }

    

    public function addProperty(Add $request)
    {
        $property = new Property();

        //property Information
        $property->provider_id = auth('provider')->id();
        $property->property_type_id = $request->get('property_type');
        $property->provider_id = $request->provider_id;
        $property->name = $request->get('name');
        $property->slug = Str::slug($request->get('name'));
        $property->description = $request->get('description');
        $property->address = $request->get('address');
        $property->phone = $request->get('phone');
        $property->email = $request->get('email');
        $property->is_always_open = $request->has('is_always_open');

        //location
        $city = City::find($request->get('city'));
        $property->country_id = $city->country_id;
        $property->state_id = $city->state_id;
        $property->city_id = $city->id;
        $property->lat = $request->get('lat');
        $property->lng = $request->get('lng');
        $property->point = new Point($request->get('lat'), $request->get('lng'));

        //information
        $property->house_rule = $request->house_rule;
        $property->health_safety = $request->health_safety;
        $property->cancellation_policy = $request->cancellation_policy;

        if ($request->hasFile('featured_image')) :
            $property->featured_image = Storage::putFile('/', $request->file('featured_image'));
        endif;

        if ($property->save()) :
            $property->refresh();

            // if ($request->has('amenities')) :
            //     $amenities = [];
            //     foreach ($request->get('amenities') as $amenity) :
            //         $amenities[] = ['property_id' => $property->id, 'amenity_id' => $amenity];
            //     endforeach;
            //     PropertyAmenity::insert($amenities);
            // endif;

            if ($request->has('timings')) :
                $timings = [];
                foreach ($request->get('timings') as $day => $timing) :
                    $day = Day::find($day);
                    $timings[] = ['property_id' => $property->id, 'day_name' => $day->name, 'day_number' => $day->id, 'opening' => $timing['opening'], 'closing' => $timing['closing'], 'is_off_day' => isset($timing['is_off_day'])];
                endforeach;
                Timing::insert($timings);
            endif;

            return Notify::send('success', 'Property Added Successfully')->callback(['redirect' => route('app.property.list')])->json();
        endif;

        return Notify::send('error', 'Can\'t Add Property Now, Please Try Again later.')->json();
    }

    public function editProperty(Edit $request, $id)
    {
        $property = Property::find($id);

        //property Information
        $property->name = $request->get('name');
        $property->slug = Str::slug($request->get('name'));
        $property->description = $request->get('description');
        $property->address = $request->get('address');
        $property->phone = $request->get('phone');
        $property->email = $request->get('email');
        $property->is_always_open = $request->has('is_always_open');

        //location
        $city = City::find($request->get('city'));
        $property->country_id = $city->country_id;
        $property->state_id = $city->state_id;
        $property->city_id = $city->id;
        $property->lat = $request->get('lat');
        $property->lng = $request->get('lng');
        $property->point = new Point($request->get('lat'), $request->get('lng'));

        //information
        $property->house_rule = $request->house_rule;
        $property->health_safety = $request->health_safety;
        $property->cancellation_policy = $request->cancellation_policy;

        if ($request->hasFile('featured_image')) :
            if (Storage::exists($property->featured_image)) :
                Storage::delete($property->featured_image);
            endif;
            $property->featured_image = Storage::putFile('/', $request->file('featured_image'));
        endif;

        if ($property->save()) :
            return Notify::send('success', 'Property Saved Successfully')->callback(['redirect' => route('app.property.list')])->json();
        endif;

        return Notify::send('error', 'Can\'t Save Property Now, Please Try Again later.')->json();
    }

    public function deleteModal($id)
    {
        $property = Property::find($id);
        if ($property) :
            return view('administration.modals.property.deletemodal', compact('property'));
        endif;
    }

    public function deleteProperty($id)
    {
        $property = Property::find($id);
        if (Storage::exists($property->featured_image)) :
            Storage::delete($property->featured_image);
        endif;
        if ($property->delete()) :
            return Notify::send('success', 'Property deleted Successfully')->callback(['redirect' => route('app.property.list')])->json();
        endif;
    }
}
