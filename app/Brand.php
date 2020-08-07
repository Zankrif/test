<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
    public function product()
    {
        return $this->belongsToMany('App\Products','brand_products','brand_id','product_id');
    }
    public function products()
    {
        return $this->belongsToMany('App\Products')->as('brand')->get();
    }
}
