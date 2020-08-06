<?php
namespace App\Services;
use App\Repositorys\BasketRepository;
use App\Repositorys\ProductRepository;
use App\Basket;
use App\Products;

class BasketService
{
    public function add($userId,Products $product)
    {
        $basketRepository = app(BasketRepository::class);
        $basketRepository->add(
            $userId,
            $product->id,
            $product->name,
            $product->price,
            1
        );
    }
    public function increase(Basket $product)
    {

        $productRepository = app(ProductRepository::class);
        $quantity = $productRepository->getQuantity($product->product_id); 
        if($product->quantity+1 <= $quantity)
        {
            $product->update(['quantity'=>$product->quantity+1]);
        }

    }
    public function decrease(Basket $product)
    {
        if($product->quantity-1 > 0)
        {
            $product->update(['quantity'=>$product->quantity-1]);
        }
    }

    public function pay($userId)
    {

        $basketRepository = app(BasketRepository::class);
        $productRepository = app(ProductRepository::class);
        $proudctService = app(ProductService::class);
        $basketModel = $basketRepository->findUserBasket($userId);
        $flag = true;
        
        foreach($basketModel as $product)
        {
            $quantity = $productRepository->getQuantity($product->product_id);

            if($product->quantity > $quantity ) 
            {

                $flag=false;
                
                if(empty($quantity))
                {
                    $product->delete();
                }
                else{
                    $product->update(['quantity'=>$quantity]) ;
                }
            }
           
            
        }
      if($flag === true)
      {
        foreach($basketModel as $product)
        {
            $proudctService->sell($product->product_id,$product->quantity);

            $product->delete();
        }
      }
        
       
        return $flag;
    }
}