<?php

namespace App\Http\Resources\Admin;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProviderSingleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $name = "name_".app()->getLocale();
        return [
            'id' => $this->id,
            'name' => $this->$name,
            'logo' => $this->logo,
            'active' => $this->active ? true : false,
            'address'=>$this->address,
            'lat'=>$this->lat,
            'long'=>$this->long,
            'category_name'=> Category::whereId($this->category_id)->select('name_'.app()->getLocale())->get(),
        ];
    }
}
