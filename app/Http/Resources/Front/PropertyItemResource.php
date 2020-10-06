<?php

namespace App\Http\Resources\Front;

use App\Models\PropertyRoom;
use App\Models\PropertySpot;
use App\Models\PropertyVehicle;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyItemResource extends JsonResource
{
    private $itemClass;

    public function __construct($resource, $itemClass){
        parent::__construct($resource);
        $this->itemClass = $itemClass;
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return PropertyRoomResource|PropertySpotResource|PropertyVehicleResource
     */
    public function toArray($request)
    {
        if($this->itemClass === PropertyRoom::class):
            return new PropertyRoomResource($this);
        elseif($this->itemClass === PropertySpot::class):
            return new PropertySpotResource($this);
        elseif($this->itemClass === PropertyVehicle::class):
            return new PropertyVehicleResource($this);
        endif;
    }
}
