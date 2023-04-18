<?php

namespace App\Services;

use App\Models\Catalog;

class CatalogService
{
    /**
     * get catalog by Id.
     *
     * @param $id
     * @return Catalog
     */
    public function getCatalogByUserId($userId)
    {
        return Catalog::select(
            'id',
            'name'
        )
        ->with('product')
        ->where('user_id', $userId)
        ->get();
    }
}
