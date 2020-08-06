<?php 
namespace App\Repositorys;
use App\CategoryProduct;

class CategoryProductRepository
{
    public function create($categoryId,$productId)
    {
        return CategoryProduct::firstOrCreate([
            'category_id'=>$categoryId,
            'product_id'=>$productId,
        ]);
    }
    public function delete($categoryId,$productId)
    {
        $categoryProductModel = CategoryProduct::where([
            ['category_id','=',$categoryId],
            ['product_id','=',$productId]
            ])->first();
        if(!empty($categoryProductModel))
        {
            $categoryProductModel->delete();
        }
    }
}