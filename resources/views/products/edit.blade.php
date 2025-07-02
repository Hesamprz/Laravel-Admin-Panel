@extends('layouts.app')

@section('title', 'ویرایش محصول')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-indigo-700 mb-6">ویرایش محصول</h1>

        <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block mb-1 font-semibold">نام محصول</label>
                <input type="text" name="name" id="name"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                       value="{{ old('name', $product->name) }}">
                @error('name')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="description" class="block mb-1 font-semibold">توضیحات</label>
                <textarea name="description" id="description"
                          class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="price" class="block mb-1 font-semibold">قیمت (تومان)</label>
                <input type="number" name="price" id="price"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                       value="{{ old('price', $product->price) }}">
                @error('price')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="size" class="block mb-1 font-semibold">سایز</label>
                <input type="text" name="size" id="size"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                       value="{{ old('size', $product->size) }}">
                @error('size')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="color" class="block mb-1 font-semibold">رنگ</label>
                <input type="text" name="color" id="color"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                       value="{{ old('color', $product->color) }}">
                @error('color')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="stock_quantity" class="block mb-1 font-semibold">موجودی</label>
                <input type="number" name="stock_quantity" id="stock_quantity"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                       value="{{ old('stock_quantity', $product->stock_quantity) }}">
                @error('stock_quantity')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <a href="{{ route('products.index') }}" class="px-4 py-2 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">
                    انصراف
                </a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    بروزرسانی
                </button>
            </div>
        </form>
    </div>
@endsection