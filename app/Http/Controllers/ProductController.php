<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'size' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'stock_quantity' => 'required|integer|min:0',
        ]);

        Product::create($request->only(['name', 'description', 'price', 'size', 'color', 'stock_quantity']));

        return redirect()->route('products.index')->with('success', 'محصول با موفقیت اضافه شد.');
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'size' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'stock_quantity' => 'required|integer|min:0',
        ]);

        $product->update($request->only(['name', 'description', 'price', 'size', 'color', 'stock_quantity']));

        return redirect()->route('products.index')->with('success', 'محصول بروزرسانی شد.');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'محصول حذف شد.');
    }
}