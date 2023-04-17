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
    public function getCatalogById($id)
    {
        return Catalog::select(
            'id',
            'name',
        )
        ->with('product')
        ->where('id', $id)
        ->get();
    }
}
