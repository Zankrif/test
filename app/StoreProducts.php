<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProducts extends Model
{
    protected $fillable = [
        'store_id',
        'product_id',
    ];
    public $timesetapps;
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
