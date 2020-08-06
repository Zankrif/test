<?php 
namespace App\Repositorys;
use App\BrandProduct;
class BrandProductRepository
{
    public function create($brandId,$productId)
    {
        return BrandProduct::firstOrCreate([
            'brand_id'=>$brandId,
            'product_id'=>$productId,
        ]);
    }
    public function delete($brandId,$productId)
    {
        $brandProductModel = BrandProduct::where([
            ['brand_id','=',$brandId],
            ['product_id','=',$productId]
            ])->first();
        if(!empty($brandProductModel))
        {
            $brandProductModel->delete();
        }
    }
}