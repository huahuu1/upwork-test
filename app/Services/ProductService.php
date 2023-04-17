<?php

namespace App\Services;

use App\Models\Catalog;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductService
{
    /**
     * Create product
     *
     * @param string $name
     * @param int $price
     * @param int $cost
     * @param string $unit
     * @param string $weight
     * @param string $imageUrl
     * @param string $description
     * @param int $catalogId
     * @param boolean $status
     */
    public function createProduct(
        $name,
        $price,
        $cost,
        $unit,
        $weight,
        $imageUrl,
        $description,
        $catalogId
    ) {
        try {
            $product = [
                'name' => $name,
                'price' => $price,
                'cost' => $cost,
                'unit' => $unit,
                'weight' => $weight,
                'image_url' => $imageUrl,
                'description' => $description,
                'catalog_id' => $catalogId
            ];
            Product::create($product);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Edit product
     *
     * @param int $id
     * @param string $name
     * @param int $price
     * @param int $cost
     * @param string $unit
     * @param string $weight
     * @param string $imageUrl
     * @param string $description
     */
    public function editProduct(
        $product,
        $name,
        $price,
        $cost,
        $unit,
        $weight,
        $imageUrl,
        $description,
    ) {
        try {
            $product->name = $name;
            $product->price = $price;
            $product->cost = $cost;
            $product->unit = $unit;
            $product->weight = $weight;
            $product->image_url = $imageUrl;
            $product->description = $description;
            $product->save();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Change product's status
     *
     * @param int $id
     * @param boolean $status
     */
    public function changeProductStatus(
        $id,
        $status
    ) {
        try {
            $product = Product::find($id);
            $product->status = $status;
            $product->save();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get product by Id.
     *
     * @param $id
     * @return Product
     */
    public function getProductById($id)
    {
        return Product::select(
            'id',
            'name',
            'price',
            'cost',
            'unit',
            'weight',
            'image_url',
            'description',
            'catalog_id',
            'status',
        )
        ->where('id', $id)
        ->get();
    }

    /**
     * Search product by name.
     *
     * @param $param
     * @return Product
     */
    public function searchProductByName($param)
    {
        return Product::select(
            'id',
            'name',
            'price',
            'cost',
            'unit',
            'weight',
            'image_url',
            'description',
            'catalog_id',
            'status',
        )
        ->when(!empty($param['name']), function ($q) use ($param) {
            $keyword = '%' . $param['name'] . '%';
            $q->where('name', 'like', $keyword);
        })
        ->get();
    }
}
