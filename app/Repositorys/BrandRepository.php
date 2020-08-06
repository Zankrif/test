<?php
namespace App\Repositorys;
use App\Brand;
class BrandRepository
{
    public function create($name)
    {
        return Brand::firstOrCreate(['name'=>$name]);
    }
    public function findById($id): ?Brand
    {
        return Brand::find($id);
    }
    public function findByName($name)
    {
        return Brand::where('name',$name)->first();
    }
    public function delete($brand)
    {
        return $brand->delete();
    }
}