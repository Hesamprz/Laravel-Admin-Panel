@extends('layouts.app')

@section('title', 'خانه')

@section('content')
    <div class="text-center py-12">
        <h1 class="text-4xl font-extrabold text-indigo-700 mb-4">به فروشگاه لباس خوش آمدید</h1>
        <p class="text-gray-600 text-lg mb-6">انواع لباس‌های با کیفیت با بهترین قیمت</p>
        <a href="{{ route('products.index') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded shadow transition">
            مشاهده محصولات
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        <div class="bg-white rounded shadow p-6 text-center">
            <h2 class="text-xl font-semibold mb-2 text-indigo-600">محصولات</h2>
            <p class="text-gray-500 mb-4">مشاهده و مدیریت موجودی محصولات</p>
            <a href="{{ route('products.index') }}" class="text-indigo-500 hover:underline">برو به محصولات</a>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <h2 class="text-xl font-semibold mb-2 text-indigo-600">سفارش‌ها</h2>
            <p class="text-gray-500 mb-4">مدیریت و پیگیری سفارش‌ها</p>
            <a href="{{ route('orders.index') }}" class="text-indigo-500 hover:underline">برو به سفارش‌ها</a>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <h2 class="text-xl font-semibold mb-2 text-indigo-600">کاربران</h2>
            <p class="text-gray-500 mb-4">لیست کاربران ثبت‌نام شده</p>
            <a href="{{ route('users.index') }}" class="text-indigo-500 hover:underline">برو به کاربران</a>
        </div>
    </div>
@endsection