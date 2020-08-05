<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [ 
        'name',
        'description',
        'price',
        'state',
        'brand',
        'category',
        'quantity'
    ];
    public function storeProducts()
    {
        return $this->hasMany('App\StoreProducts','product_id');
    }
}
