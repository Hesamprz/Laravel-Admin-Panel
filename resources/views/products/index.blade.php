@extends('layouts.app')

@section('title', 'لیست محصولات')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-indigo-700">لیست محصولات</h1>
        <a href="{{ route('products.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            افزودن محصول جدید
        </a>
    </div>

    @if($products->count())
        <div class="overflow-x-auto rounded shadow bg-white">
            <table class="min-w-full border text-sm text-right">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border-b">#</th>
                        <th class="px-4 py-3 border-b">نام</th>
                        <th class="px-4 py-3 border-b">قیمت</th>
                        <th class="px-4 py-3 border-b">رنگ</th>
                        <th class="px-4 py-3 border-b">سایز</th>
                        <th class="px-4 py-3 border-b">موجودی</th>
                        <th class="px-4 py-3 border-b">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border-b">{{ $product->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $product->name }}</td>
                            <td class="px-4 py-2 border-b">{{ number_format($product->price) }} تومان</td>
                            <td class="px-4 py-2 border-b">{{ $product->color ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $product->size ?? '-' }}</td>
                            <td class="px-4 py-2 border-b">{{ $product->stock_quantity }}</td>
                            <td class="px-4 py-2 border-b flex space-x-2 rtl:space-x-reverse">
                                
                                <a href="{{ route('products.edit', $product) }}"
                                   class="text-yellow-600 hover:underline">ویرایش</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST"
                                      onsubmit="return confirm('آیا مطمئن هستید؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
            هیچ محصولی ثبت نشده است.
        </div>
    @endif

@endsection