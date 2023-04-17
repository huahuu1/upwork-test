<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CatalogService;

class CatalogController extends Controller
{
    protected $catalogService;

    /**
     * CatalogController constructor.
     *
     * @param CatalogService $catalogService
     */
    public function __construct(
        CatalogService $catalogService
    ) {
        $this->catalogService = $catalogService;
    }

    /**
     * Get catalog by Id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCatalogById(Request $request)
    {
        return response()->json([
            'data' => $this->catalogService->getCatalogById($request->id)->all(),
        ]);
    }
}
