<?php
namespace App\Services;

use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Validator;

class CategoryProductService
{
    public function getAllCategories()
    {
        return CategoryProduct::all();
    }

    public function getCategoryById($id)
    {
        return CategoryProduct::findOrFail($id);
    }

    public function createCategory($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        return CategoryProduct::create($data);
    }

    public function updateCategory($id, $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $category = CategoryProduct::findOrFail($id);
        $category->update($data);

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = CategoryProduct::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully.']);
    }
}
