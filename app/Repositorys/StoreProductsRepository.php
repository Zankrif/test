<?php
namespace App\Repositorys;

use App\Store;
use App\StoreProducts;

class StoreProductsRepository
{
    /**
     * @var int $store_id
     * @var int $product_id
     */
    public function create($store_id,$product_id)
    {
        StoreProducts::create([
            'store_id'=>$store_id,
            'product_id'=>$product_id,
        ]);
    }
    /**
     * @var int $storeId,
     * @var int $productId
     */
    public function delete($storeId,$productId)
    {
        StoreProducts::where([
            ['store_id',"=",$storeId],
            ['product_id','=',$productId]
        ])->first()->delete();
    }
}