<?php 

namespace App\Http\Controllers;


use App\Http\Requests\ShortProductRequest;
use App\Repositorys\StoreRepository;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Store;
use App\Products;
use App\User;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $user =  $request->user();
        /** @var StorRepository $storeRepository */
        $storeRepository = app(StoreRepository::class);
        $stores = $user->stores()->paginate(4);

       
        return view('storepage',compact('stores'));
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
        $products  = $store->products()->with('brand','category')->paginate(7);

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

    public function post(Request $request, Store $store)
    {
         /** @var StoreRepository $storeRepository */
         $storeRepository = app(StoreRepository::class);
         $storeRepository->update($store, $request->input('name'));
         return redirect()->route('store.index');
    }
}