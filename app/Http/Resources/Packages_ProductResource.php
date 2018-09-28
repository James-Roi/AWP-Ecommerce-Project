<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Packages_ProductResource extends JsonResource
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
            'id' => $this->id,
            'package_id' => $this->package_id,
            'product_id' => $this->product_id,
            'product_quantity' => $this->product_quantity,
            'relationships' => new Packages_ProductRelationshipResource($this)
        ];
    }
}
