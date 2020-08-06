<?php
namespace App\Services;

use App\Repositorys\CategoryRepository;

class CategoryService
{
    public function create($name)
    {
        return app(CategoryRepository::class)->create($name);
    }
}