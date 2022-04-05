<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $table = 'services';
    protected $guarded = [];


    public function service_provider()
    {
        return $this->belongsTo(ServiceProvider::class,'service_provider_id');
    }

}
