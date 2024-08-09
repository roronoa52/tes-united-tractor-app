<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return response()->json($this->productService->getAllProducts());
    }

    public function show($id)
    {
        return response()->json($this->productService->getProductById($id));
    }

    public function store(Request $request)
    {
        return response()->json($this->productService->createProduct($request->all()), 201);
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->productService->updateProduct($id, $request->all()));
    }

    public function destroy($id)
    {
        return $this->productService->deleteProduct($id);
    }
}
