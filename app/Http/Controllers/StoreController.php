<?php 

namespace App\Http\Controllers;


use App\Http\Requests\ShortProductRequest;
use App\Repositorys\StoreRepository;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Store;
use App\Products;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->id;
        /** @var StorRepository $storeRepository */
        $storeRepository = app(StoreRepository::class);
        $store= $storeRepository->searchByOwnerId($request->user()->id);
        return view('storepage',compact('store'));
    }
    public function show()
    {
        return view('storeform');
    }
    public function create(Request $request)
    {
        /** @var StoreRepository $storeRepository */
        $storeRepository = app(StoreRepository::class);
        
        $storeRepository->create($request->user()->id, $request->input('name'));
        $request->user()->update(['store_created'=>true]);
        return redirect()->route('store.index');
    }
    public function products(Request $request, Store $store)
    {
        $products = $store->products()->paginate(6);
        
        return view('storeProductsList',compact('products','store'));

    }
    public function edit(Store $store ,Products $product)
    {
        return view('productEdit',compact('store','product'));
    }

    public function updateProduct(ShortProductRequest $request, Store $store, Products $product)
    {
        $product->update([
        'name'=>$request->input('name'),
        'description'=>$request->input('description'),
        'price'=>$request->input('price'),
        'quantity'=>$request->input('quantity'),
        ]);
        return redirect()->route('store.products.index',compact('store'));
    }

    public function delete(Store $store,$id)
    {
        /** @var $productService ProductService */
        $productService = app(ProductService::class);
        $productService->delete($store,$id);
        return redirect()->route('store.products.index',compact('store'));
    }
}