<?php
namespace App\Repositorys;
use App\Basket;

class BasketRepository
{
    public function add($userId,$id, $name,$price, $description,$quantity)
    {   

        if(empty( $this->find($userId,$id) ) )
        {
            Basket::create([
                'owner_id'=>$userId,
                'product_id'=>$id,
                'product_name'=>$name,
                'product_price'=>$price,
                'product_description'=>$description,
                'quantity'=>$quantity,
            ]);
        }

    }
    public function findUserBasket($userId)
    {
        return Basket::where('owner_id',$userId)->get();
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

  
}