<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded = [];


    public function service_povides()
    {
        return $this->hasMany(ServiceProvider::class,'category_id');
    }

    public function getIconAttribute($value)
    {
        // return $value = asset('uploads/category/'.$value);
        return storage_path('app/admin/uploads/categories/'.$value);

    }

}
