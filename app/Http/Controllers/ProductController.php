<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Products;
use App\Services\ProductService;
use App\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::paginate(12);
        return view('main',compact('products'));
    }
    public function show(Request $request,Store $store)
    {
        return view('productform',compact('store'));
    }
    public function post(ProductRequest $request, Store $store)
    {  

        $productService = app(ProductService::class);
        $productService->create(
            $store,
            $request->input('name'),
            $request->input('description'),
            $request->input('price'),
            $request->input('quantity'),
            $request->input('brand'),
            $request->input('category')
        );  
        return redirect()->route('store.index');
    }


}