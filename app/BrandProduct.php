<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'brand_id',
    ];
}
