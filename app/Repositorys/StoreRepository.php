<?php 
namespace App\Repositorys;
use App\Store;

class StoreRepository 
{

    /**
     * @var int $storeOwnerId
     * @var string $storeName
     * @return Store|null
     */
    public function create($storeOwnerId , $storeName): ?Store
    {
        return Store::firstOrCreate([
            'store_owner_id' => $storeOwnerId,
            'store_name' => $storeName,
        ]);
    }

    /**
     * @var int $storeId
     * @return Store|null
     */
    public function find($storeId): ?Store
    {
        return Store::find($storeId);
    }

    /**
     * @var int $storeOwnerId
     * @return Store|null
     */
    public function searchByOwnerId($storeOwnerId): ?Store
    {
        return Store::where('store_owner_id',$storeOwnerId)->first();
    }
    /**
     * @var Store $store
     * @var string $storeName
     * @return void
     */
    public function update($store, $storeName)
    {
        $store->update([
            'store_name' => $storeName
        ]);
    }

    /**
     * @var Store $store
     * @return bool 
     */
    public function delete($store)
    {
        return $store->delte();
    }
}