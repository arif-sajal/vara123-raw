<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class TimingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'dayName'=> $this->day_name,
            'dayNumber'=> $this->day_number,
            'opening'=> $this->opening,
            'closing'=> $this->closing,
            'isOffDay'=> $this->is_off_day
        ];
    }
}
