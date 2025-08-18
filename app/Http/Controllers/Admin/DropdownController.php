<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function getProductNamesByCategory($category_id): JsonResponse
    {
        $products = Product::where('category_id', $category_id)
            ->pluck('product_name', 'id'); // 'id' => 'product_name'

        return response()->json($products);
    }

    public function getProductPrice($id): JsonResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json(['price' => $product->price]);
    }

    public function getAllProducts()
    {
        $products = \App\Models\Product::pluck('product_name', 'id');
        return response()->json($products);
    }
}
