<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CategorySingleResource extends JsonResource
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
            'icon' => $this->icon,
            'need_delivery' => $this->need_delivery ? true : false,
            'active' => $this->active ? true : false,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
