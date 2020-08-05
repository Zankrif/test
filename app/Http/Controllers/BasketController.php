<?php
namespace App\Http\Controllers;

use App\Basket;
use App\Products;
use Illuminate\Http\Request;
use App\Repositorys\BasketRepository;
use App\Repositorys\ProductRepository;

class BasketController
{ 
    public function __construct(Request $request){}
    public function addToOrder(Request $request, Products $product)
    {

        $basketRepository = app(BasketRepository::class);
        $basketRepository->add(
            $request->user()->id,
            $product->id,
            $product->name,
            $product->price,
            1
        );
        return redirect('basket');
    }
    public function show(Request $request)
    {
        $basketRepository = app(BasketRepository::class);
        $basket =  $basketRepository->show($request->user()->id);
        $totalPrice=0;
        foreach($basket as $node)
        {
            $totalPrice +=$node->product_price*$node->quantity;
        }
        return view('basket',compact('basket','totalPrice'));
    }
    public function increase(Basket $product)
    {

        $productRepository = app(ProductRepository::class);
        $quantity = $productRepository->getQuantity($product->product_id); 
        if($product->quantity+1 <= $quantity)
        {
            $product->update(['quantity'=>$product->quantity+1]);
        }
        return redirect()->route('basket.index');
    }
    public function decrease(Basket $product)
    {
        if($product->quantity-1 > 0)
        {
            $product->update(['quantity'=>$product->quantity-1]);
        }
        return redirect()->route('basket.index');
    }
    public function delete(Basket $product)
    {
        $basketRepository = app(BasketRepository::class);
        $basketRepository->delete($product);
        return redirect()->route('basket.index');
    }
}