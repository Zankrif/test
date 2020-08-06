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
    public function brandProducts()
    {
        return $this->hasMany('App\BrandProduct','product_id');
    }
    public function categoryProducts()
    {
        return $this->hasMany('App\CategoryProduct','product_id');
    }
    public function storeProducts()
    {
        return $this->hasMany('App\StoreProducts','product_id');
    }
    public function brand()
    {
        return $this->belongsToMany('App\Brand','brand_products','product_id','brand_id');
    }
    public function category()
    {
        return $this->belongsToMany('App\Category','category_products','product_id','category_id');
    }
    public function store()
    {
        return $this->belongsToMany('App\Store')->as('product')->withTimestamps();
    }
}
