<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Products')->as('brand')->get();
    }
}
