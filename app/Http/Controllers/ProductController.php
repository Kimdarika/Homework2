<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'category_id' => $request->category_id
        ]);

        return response()->json($product);
    }

    public function index()
    {
        $products = Product::with('category')->get();

        $data = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => $product->qty,
                'category' => $product->category?->name
            ];
        });

        return response()->json($data);
    }
}