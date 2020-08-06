<?php 
namespace App\Repositorys;
use App\Category;

class CategoryRepository
{
    public function create($name)
    {
        return Category::firstOrCreate(['name'=>$name]);
    }
    public function findById($id): ?Category
    {
        return Category::find($id);
    }

    public function findByName($name)
    {
        return Category::where('name',$name)->first();
    }

    public function delete($category)
    {
        return $category->delete();
    }
}