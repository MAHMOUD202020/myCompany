<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'sort' => $this->sort,
            'title' => $this['title_'.$lang],
            'background' => asset("assets/web/images/slider/$this->background"),
            'img' => asset("assets/web/images/slider/$this->img"),
            'text' => $this["text_".$lang],
            'btn_text' => $this["btn_text_".$lang],
            'url' => $this->url
        ];
    }
}
