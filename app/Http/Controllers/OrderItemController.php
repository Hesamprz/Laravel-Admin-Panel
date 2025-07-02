<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{

    public function index()
    {
        $orderItems = OrderItem::with(['order', 'product'])->get();
        return view('order_items.index', compact('orderItems'));
    }

    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_items.create', compact('orders', 'products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        OrderItem::create($request->only(['order_id', 'product_id', 'quantity', 'price']));

        return redirect()->route('order-items.index')->with('success', 'آیتم سفارش ایجاد شد.');
    }


    public function show(OrderItem $orderItem)
    {
        return view('order_items.show', compact('orderItem'));
    }


    public function edit(OrderItem $orderItem)
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_items.edit', compact('orderItem', 'orders', 'products'));
    }


    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderItem->update($request->only(['order_id', 'product_id', 'quantity', 'price']));

        return redirect()->route('order-items.index')->with('success', 'آیتم سفارش بروزرسانی شد.');
    }


    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('order-items.index')->with('success', 'آیتم سفارش حذف شد.');
    }
}