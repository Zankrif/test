<?php
namespace App\Services;
use App\Repositorys\BrandRepository;
class BrandService
{

    public function create($name)
    {
        return app(BrandRepository::class)->create($name);
    }
}