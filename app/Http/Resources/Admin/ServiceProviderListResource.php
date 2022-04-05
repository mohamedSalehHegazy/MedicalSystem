<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProviderListResource extends JsonResource
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

        ];
    }
}
