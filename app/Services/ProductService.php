<?php
namespace App\Services;
use App\Repositorys\ProductRepository;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Repositorys\BrandProductRepository;
use App\Repositorys\StoreProductsRepository;
use App\Repositorys\CategoryProductRepository;
use App\Products;
use App\Store;
class ProductService
{
    /**
     * @var Store $store
     * @var string $name
     * @var string $description
     * @var double $price
     * @var bool $state
     * @var int $quantity
     * @return Products|null
     */
    public function create($store, $name ,$description, $price, $quantity, $brand , $category): ?Products
    {
        /** @var ProductRepository $productRepository */
        $productRepository = app(ProductRepository::class);
        $brandService = app(BrandService::class);
        $categoryService = app(CategoryService::class);

            $brandId = $brandService->create($brand)->id;
            $category = $categoryService->create($category)->id;
            $productModel = $productRepository->create($name ,$description,$price,$quantity);
            app( BrandProductRepository::class)->create($brandId,$productModel->id);
            app( CategoryProductRepository::class)->create($category,$productModel->id);
            app(StoreProductsRepository::class)->create($store->id,$productModel->id);
        
        
         
       
        return $productModel;

    }
    function RandomString(int $length)
    {
        $characters = 'abcABC'; 
        $randomString = ''; 
      
        for ($i = 0; $i < $length; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
      
        return $randomString; 
    }

    public function update(Store $store , $id , $name ,$description , $price , $quantity)
    {
        $store->products()->where('product_id',$id)->first()->update([
            'name'=>$name,
            'description'=>$description,
            'price'=>$price,
            'quantity'=>$quantity
        ]);
            
    }

    public function delete(Store $store, $id)
    {
        $product = $store->products()->where('product_id',$id)->first();
        
        $store->product()->where('product_id',$id)->delete();
        if($product->storeProducts()->first() === null)
        {
            $product->delete();
        }

    }

    public function sell($proudctId , $quantity)
    {
        $productRepository = app(ProductRepository::class);
        $product=$productRepository->findById($proudctId);
        $newQuantity = $product->quantity - $quantity;
        if($newQuantity <= 0)
        {
            $product->storeProducts()->delete();
            $product->brandProducts()->delete();
            $product->categoryProducts()->delete();
            $product->delete();
        }
        else{
            $product->update([
                'quantity'=>$newQuantity
            ]);
        }

    }
}
