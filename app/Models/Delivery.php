<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use SoftDeletes;

    protected $table = 'deliveries';
    protected $guarded = [];


    protected $casts = [
        'lat'=>'double',
        'long'=>'double',
    ];

}
