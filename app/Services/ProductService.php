<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    public function getAllProducts()
    {
        return Product::with('category')->get();
    }

    public function getProductById($id)
    {
        return Product::with('category')->findOrFail($id);
    }

    public function createProduct($data)
    {
        $validator = Validator::make($data, [
            'product_category_id' => 'required|exists:category_products,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if (isset($data['image'])) {
            $path = $data['image']->store('products', 'public');
            $data['image'] = $path;
        }

        return Product::create($data);
    }

    public function updateProduct($id, $data)
    {
        $validator = Validator::make($data, [
            'product_category_id' => 'exists:category_products,id',
            'name' => 'string|max:255',
            'price' => 'numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $product = Product::findOrFail($id);

        if (isset($data['image'])) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $path = $data['image']->store('products', 'public');
            $data['image'] = $path;
        }

        $product->update($data);

        return $product;
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully.']);
    }
}
