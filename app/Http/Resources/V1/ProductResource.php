<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this['name_'.$lang],
            'img' => asset("assets/web/images/products/$this->img"),
            'gallery' => $this->gallery ? json_decode($this->gallery) : null,
            'add_item_in_home' => $this->is_home,
            'shortDescription' => $this["shortDescription_".$lang],
            'description' => $this["description_".$lang],
            'category_id' => $this->category_id,
            'category_name' => $this->category?->name,
        ];
    }
}
