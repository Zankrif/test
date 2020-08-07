<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
    public function product()
    {
        return $this->belongsToMany('App\Products','category_products','category_id','product_id');
    }
    public function products()
    {
        return $this->belongsToMany('App\Products')->as('category');
    }
}
