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
        $name = "name_".app()->getLocale();
        $description = "description_".app()->getLocale();
        return [
            'id' => $this->id,
            'name' => $this->$name,
            'description'=>$this->$description,
            'active' => $this->active ? true : false,
            'image'=>$this->image,
            'price'=>$this->price,
            'service_provider_name'=>ServiceProvider::whereId($this->service_provider_id)->first($name),
            ];
        }
}
