<?php

namespace App\Http\Resources\Admin;

use App\Models\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceSingleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $serviceProvider = ServiceProvider::whereId($this->service_provider_id)->select('name_en','name_ar')->first();
        return [
            'id' => $this->id,
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
            'description_en'=>$this->description_en,
            'description_ar'=>$this->description_ar,
            'active' => $this->active ? true : false,
            'image'=>$this->image,
            'price'=>$this->price,
            'service_provider_name_en'=>$serviceProvider->name_en,
            'service_provider_name_ar'=>$serviceProvider->name_ar,
            ];
        }
}
