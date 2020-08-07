<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable =[
        'owner_id',
        'product_id',
        'product_name',
        'product_description',
        'product_price',
        'quantity',
    ];
}
