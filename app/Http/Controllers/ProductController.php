<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Requests\ProductRequest;
use App\Products;
use App\Repositorys\BrandRepository;
use App\Repositorys\CategoryRepository;
use App\Services\ProductService;
use App\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::with('brand','category')->paginate(12);

        return view('main',compact('products'));
    }
    public function search(Request $request)
    {
        $type = $request->input('type');
        if($type == 1)
        {
            $brandRepository = app(BrandRepository::class);
            $brand =  $brandRepository->findByName($request->input('value'));
            if(!empty($brand))
            {
                return redirect()->route('main.brand',['brand'=>$brand]);
            }
        }
        else{
            
            $categoryRepository = app(CategoryRepository::class);
            $category =  $categoryRepository->findByName($request->input('value'));
            if(!empty($category))
            {
                return redirect()->route('main.category',['category'=>$category]);
            }
        }
        return view('main');
    }
    public function searchByBrand(Request $request , Brand $brand)
    {
        $products = $brand->product()->with('brand','category')->paginate(12);
        return view('main',compact('products'));
    }
    public function searchByCategory(Request $request , Category $category)
    {
        $products = $category->product()->with('brand','category')->paginate(12); 
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