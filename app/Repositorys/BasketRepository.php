<?php
namespace App\Repositorys;
use App\Basket;

class BasketRepository
{
    public function add($user,$id, $name,$price,$quantity)
    {   

        if(empty( $this->find($user,$id) ) )
        {
            Basket::create([
                'owner_id'=>$user,
                'product_id'=>$id,
                'product_name'=>$name,
                'product_price'=>$price,
                'quantity'=>$quantity,
            ]);
        }

    }
    public function find($user,$id)
    {
        return Basket::where([
            'owner_id'=>$user,
            'product_id'=>$id,
        ])->first();
    }
    public function delete($product)
    {
        $product->delete();
    }

    public function show($user)
    {
       return Basket::where('owner_id',$user)->get();
    }
}