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
        $category = Category::whereId($this->category_id)->select('name_en','name_ar')->first();
        return [
            'id' => $this->id,
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
            'logo' => $this->logo,
            'active' => $this->active ? true : false,
            'address'=>$this->address,
            'lat'=>$this->lat,
            'long'=>$this->long,
            'category_name_en'=> $category->name_en,
            'category_name_ar'=> $category->name_ar,
        ];
    }
}
