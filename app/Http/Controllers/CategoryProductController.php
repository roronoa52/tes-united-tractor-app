<?php

namespace App\Http\Controllers;

use App\Services\CategoryProductService;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $categoryProductService;

    public function __construct(CategoryProductService $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }

    public function index()
    {
        return response()->json($this->categoryProductService->getAllCategories());
    }

    public function show($id)
    {
        return response()->json($this->categoryProductService->getCategoryById($id));
    }

    public function store(Request $request)
    {
        return response()->json($this->categoryProductService->createCategory($request->all()), 201);
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->categoryProductService->updateCategory($id, $request->all()));
    }

    public function destroy($id)
    {
        return $this->categoryProductService->deleteCategory($id);
    }
}
