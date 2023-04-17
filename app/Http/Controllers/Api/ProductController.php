<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Catalog;
use App\Models\Product;
use App\Services\ProductService;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $productService;

    /**
     * ProductController constructor.
     *
     * @param ProductService $productService
     */
    public function __construct(
        ProductService $productService
    ) {
        $this->productService = $productService;
    }

    /**
     * Create product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProduct(CreateProductRequest $request)
    {
        try {
            $catalog = Catalog::find($request->catalog_id);
            if (!$catalog) {
                return response()->json([
                    'message' => "Catalog not found"
                ], 422);
            }
            $this->productService->createProduct(
                $request->name,
                $request->price,
                $request->cost,
                $request->unit,
                $request->weight,
                $request->image_url,
                $request->description,
                $request->catalog_id
            );
            return response()->json([
                'message' => "Product created successfully",
            ], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json([
                'message' => "Product created failed",
                'error' => $e,
            ], 400);
        }
    }

    /**
     * Edit product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function editProduct(EditProductRequest $request)
    {
        try {
            $product = Product::find($request->id);
            if (!$product) {
                return response()->json([
                    'message' => "Product not found"
                ], 422);
            }
            $this->productService->editProduct(
                $product,
                $request->name,
                $request->price,
                $request->cost,
                $request->unit,
                $request->weight,
                $request->image_url,
                $request->description,
                $request->status
            );
            return response()->json([
                'message' => "Product edited successfully",
            ], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json([
                'message' => "Product edited failed",
                'error' => $e,
            ], 400);
        }
    }

    /**
     * Change product's status.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeProductStatus(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'status' => 'required'
                ]
            );
            if ($validator->fails()) {
                return response()->json([
                    "message" => "The status field is required.",
                    "errors" => [
                        "status" => [
                            "The status field is required."
                        ]
                    ]
                ], 422);
            }
            $this->productService->changeProductStatus(
                $request->id,
                $request->status
            );
            return response()->json([
                'message' => "Product status changed successfully",
            ], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json([
                'message' => "Product status changed failed",
                'error' => $e,
            ], 400);
        }
    }

    /**
     * Get product by Id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductById(Request $request)
    {
        return response()->json([
            'data' => $this->productService->getProductById($request->id)->all(),
        ]);
    }

    /**
     * Search product by name.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchProductByName(Request $request)
    {
        $result = $this->productService->searchProductByName($request->all());
        return response()->json([
            'data' => $result->values()->all()
        ]);
    }
}
