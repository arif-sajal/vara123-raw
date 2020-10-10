<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\AmenityResource;
use App\Http\Resources\Front\PropertyCollection;
use App\Http\Resources\Front\PropertyResource;
use App\Http\Resources\Front\PropertyTypeResource;
use App\Models\Amenity;
use App\Models\BillingType;
use App\Models\Bookmark;
use App\Models\Customer;
use App\Models\Property;
use App\Models\PropertyType;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;
use Library\Api\Facades\Api;

class PropertyController extends Controller
{

    private $customer;

    public function __construct(){
        $this->middleware('config');
        $this->middleware('converter');
    }

    public function getPropertyTypes(Request $request){
        $propertyTypes = PropertyType::all();
        return Api::data(PropertyTypeResource::collection($propertyTypes))->send();
    }

    public function searchByPoint(Request $request){
        $perPage = $request->has('perPage') ? $request->get('perPage') : 12;
        $distance = $request->has('distance') ? $request->get('distance') : 10;
        $point = new Point($request->get('lat'),$request->get('lng'));

        $properties = Property::distanceSphere('point', $point,$distance);

        $properties->where('is_active',true);

        if($request->has('propertyType')):
            $properties->where('property_type_id',$request->get('propertyType'));
        endif;

        if($request->has('billingType')):
            $properties->whereHas('billings',function($query) use ($request) {
                $query->where('billing_type_id',$request->get('billingType'));
            });
        endif;

        if($request->has('amenities')):
            $properties->whereHas('amenities',function($query) use ($request) {
                $query->whereIn('amenities.id',$request->get('amenities'));
            });
        endif;

        return Api::data(new PropertyCollection($properties->paginate($perPage)))->send();
        //return PropertyResource::collection($properties->paginate($perPage));
    }

    public function getSingleProperty($slug){
        $property = Property::where('slug',$slug)->first();

        if($property):
            $property->increment('viewed');
            return Api::data(new PropertyResource($property))->send();
        endif;

        return Api::message('The Property You Are Trying To Find Doesn\'t Exists.')->statusCode(404)->send();
    }

    public function addToBookmark(Request $request,$propertyID){
        $this->__set_customer__();
        $bookmark = new Bookmark();
        $property = Property::find($propertyID);
        $existingBookmark = Bookmark::where('customer_id',$this->customer->id)->where('property_id',$property->id);
        if(!$existingBookmark->exists() && $property):
            $bookmark->property_id = $propertyID;
            $bookmark->customer_id = $this->customer->id;

            if($bookmark->save()):
                return Api::message('Property Added To Bookmark.')->send();
            endif;
            return Api::message('Can\'t Bookmark Now, Please Try Again later.')->statusCode(409)->send();
        endif;

        return Api::message('You Already Bookmarked This Property.')->statusCode(403)->send();
    }

    public function removeFromBookmark(Request $request,$propertyID){
        $this->__set_customer__();
        $property = Property::find($propertyID);

        if($property):
            $bookmark = Bookmark::where('customer_id',$this->customer->id)->where('property_id',$property->id)->first();
            if($bookmark && $bookmark->delete()):
                return Api::message('Bookmark Deleted Successfully.')->send();
            endif;
            return Api::message('Can\'t Remove Bookmark Now, Please Try Again later.')->statusCode(409)->send();
        endif;

        return Api::message('Invalid Action')->statusCode(403)->send();
    }

    public function getAmenities(Request $request){
        $amenities = Amenity::query();
        if($request->has('for')):
            $amenities->where('for',$request->has('for'));
        endif;
        return Api::data(AmenityResource::collection($amenities->get()))->send();
    }

    public function getBillingTypes(Request $request){
        $billingTypes = BillingType::all();
        return Api::data($billingTypes)->send();
    }

    private function __set_customer__(){
        $session = session()->get('__api_session__');
        $this->customer = Customer::find($session->user_id);
    }
}
