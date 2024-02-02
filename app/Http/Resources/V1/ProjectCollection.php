<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectCollection extends JsonResource
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
            'img' => asset("assets/web/images/projects/$this->img"),
            'cover' => asset("assets/web/images/projects/$this->cover"),
            'shortDescription' => $this->shortDescription,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'category_name' => $this->category?->name,
            ];
    }
}
