<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class StockRelationshipResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //die($this->product);
        return [
            'product' => new ProductResource($this->product)
        ];
    }
}
