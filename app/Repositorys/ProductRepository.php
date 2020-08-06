<?php 
namespace App\Repositorys;
use App\Products;

class ProductRepository
{
    public function findById($id): ?Products
    {
        return Products::find($id);
    }
    public function findByName($name): ?Products
    {
        return Products::where('name',$name)->first();
    }
    public function getQuantity($id)
    {
        $productModel =  $this->findById($id);
        if(!empty($productModel))
        {
            return $productModel->quantity;
        }
        else{
            return null;
        }
        
    }
    /**
     * @var string $name
     * @var string $descripton
     * @var double $price
     * @var bool $state
     * @var int $quantity
     * @return Products|null
     */
    public function create( $name, $descripton , $price  , $quantity ): ?Products
    {
        return  Products::firstOrCreate([
            'name'=>$name,
            'description'=>$descripton,
            'price'=>$price,
            'state'=>true,

            'quantity'=>$quantity,
        ]);
    }
    /**
     * @var Produts $product
     * @var int $quantity
     * @return Products|null
     */
    public function updateQuantity($product, $quantity): ?Products
    {
        return $product->update([
            'quantity'=>$quantity
        ]);
    }
    /**
     * @var Produts $product
     * @var bool $status
     * @return Products|null
     */
    public function updateStatus($product , $status): ?Products
    {
        return $product->update([
            'status'=>$status
        ]);
    }
    /**
     * @var Products $product
     * @var dobule $price
     * @return Products|null
     */
    public function updatePrice($product , $price): ?Products
    {
        return $product->update([
            'price'=>$price
        ]);
    }
    /**
     * @var Prodcut $product
     * @var strign $descripton
     * @return Prodcuts|null
     */
    public function updateDescription($product ,$descripton): ?Products
    {
        return $product->update([
            'description'=>$descripton
        ]);
    }
    /**
     * @var Products $product
     * @var double $price
     * @var int $quantity
     * @return Products|null
     */
    public function update($product, $price , $quantity) : ?Products
    {
        return $product->update([
            'price'=>$price,
            'quantity'=>$quantity
        ]);
    }

    /**
     * @var Products $product
     * @return bool|null
     */
    public function delete($product): ?bool
    {
        return $product->delete();
    }
}