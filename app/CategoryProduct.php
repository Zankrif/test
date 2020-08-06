<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'category_id',
    ];
}
