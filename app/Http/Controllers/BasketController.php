<?php
namespace App\Http\Controllers;

use App\Basket;
use App\Products;
use Illuminate\Http\Request;
use App\Repositorys\BasketRepository;
use App\Repositorys\ProductRepository;
use App\Services\BasketService;

class BasketController
{ 
    public function __construct(Request $request){}
    public function addToOrder(Request $request, Products $product)
    {

       
       app(BasketService::class)->add(
            $request->user()->id,
           $product
        );
        return redirect('basket');
    }
    public function show(Request $request)
    {
        $basketRepository = app(BasketRepository::class);
        
        $basket = Basket::where('owner_id',$request->user()->id)->paginate(3);
        $totalPrice=0;
        foreach($basket as $node)
        {
           
            $totalPrice +=$node->product_price*$node->quantity;
        }
    
        return view('basket',compact('basket','totalPrice'));
    }
    public function increase(Basket $product)
    {

        app(BasketService::class)->increase($product);
        return redirect()->route('basket.index');
    }
    public function decrease(Basket $product)
    {
        app(BasketService::class)->decrease($product);
        return redirect()->route('basket.index');
    }
    public function pay(Request $request)
    {
        $userId = $request->user()->id;
        $type=false;
        if(app(BasketService::class)->pay($userId))
        {
            $type=true;
            return view('bill',compact('type'));
        }
        else{
            
          
            return view('bill',compact('type'));
        }
    }
    public function delete(Basket $product)
    {
        $basketRepository = app(BasketRepository::class);
        $basketRepository->delete($product);
        return redirect()->route('basket.index');
    }
}