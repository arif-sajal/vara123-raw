<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SearchCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = 'App\Http\Resources\Front\Search';

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
