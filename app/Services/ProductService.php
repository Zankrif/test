<?php
namespace App\Services;
use App\Repositorys\ProductRepository;
use App\Repositorys\StoreProductsRepository;
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
    public function create($store , $name ,$description, $price, $quantity, $brand , $category): ?Products
    {
        /** @var ProductRepository $productRepository */
        $productRepository = app(ProductRepository::class);
        $storeProductRepository =  app (StoreProductsRepository::class);
        for($i=0;$i<20;$i++)
        {
            $name = $this->RandomString(5);

            $brand = $this->RandomString(10);
            $category=$this->RandomString(15);
            $price = mt_rand(1,9999)/10;
            $quantity=mt_rand(1,9999);
            $productModel = $productRepository->create($name ,$description,$price,$brand, $category,$quantity);


            $storeProductRepository->create($store->id,$productModel->id);
        }
       
        return $productModel;

    }
    function RandomString(int $length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
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
}
