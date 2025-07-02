<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Product;
=======
>>>>>>> 78e72bb29cdbc01d296492136d2e3612c6e96224
use Illuminate\Http\Request;

class ProductController extends Controller
{
<<<<<<< HEAD

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
=======
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = \App\Models\Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
>>>>>>> 78e72bb29cdbc01d296492136d2e3612c6e96224
