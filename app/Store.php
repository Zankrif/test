<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $id = 'id';
    protected $fillable = [
        'store_name',
        'store_owner_id',
    ];
    public $timesetapps = true;
    public function products()
    {
        return $this->belongsToMany('App\Products','store_products','store_id','product_id');
    }
    public function product()
    {
        return $this->belongsToMany('App\Products','store_products','store_id','product_id');
    }
}
