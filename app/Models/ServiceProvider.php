<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\Cast\Double;

class ServiceProvider extends Model
{
    use SoftDeletes;

    protected $table = 'service_providers';
    protected $guarded = [];

    protected $casts = [
        'lat'=>'double',
        'long'=>'double',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
