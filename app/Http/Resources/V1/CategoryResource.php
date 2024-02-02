<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'icon' => asset("assets/web/images/categories/$this->icon"),
            'projects' => ProjectCollection::collection($this->whenLoaded('projects')),
            'products' => ProductCollection::collection($this->whenLoaded('products')),
        ];
    }
}
