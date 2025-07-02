<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('user')->get();
        return view('orders.index', compact('orders'));
    }


    public function create()
    {
        $users = User::all();
        return view('orders.create', compact('users'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
            'total_price' => 'required|numeric|min:0'
        ]);
    
        Order::create($validated);
    
        return redirect()->route('orders.index')->with('success', 'سفارش با موفقیت ثبت شد.');
    }

    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product']);
        return view('orders.show', compact('order'));
    }


    public function edit(Order $order)
    {
        $users = User::all();
        return view('orders.edit', compact('order', 'users'));
    }


    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
            'total_price' => 'required|numeric|min:0'
        ]);
    
        $order->update($validated);
    
        return redirect()->route('orders.index')->with('success', 'سفارش با موفقیت ویرایش شد.');
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'سفارش حذف شد.');
    }
}