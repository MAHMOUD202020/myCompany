<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang =  app()->getLocale();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'img' => asset("assets/web/images/products/$this->img"),
            'add_item_in_home' => $this->is_home,
            'shortDescription' => $this->shortDescription,
            'category_id' => $this->category_id,
            'category_name' => $this->category?->name,
            ];
    }
}
