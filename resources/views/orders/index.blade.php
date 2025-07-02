@extends('layouts.app')

@section('title', 'لیست سفارش‌ها')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-indigo-700">لیست سفارش‌ها</h1>
        <a href="{{ route('orders.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            ثبت سفارش جدید
        </a>
    </div>

    @if($orders->count())
        <div class="overflow-x-auto rounded shadow bg-white">
            <table class="min-w-full border text-sm text-right">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border-b">#</th>
                        <th class="px-4 py-3 border-b">نام مشتری</th>
                        <th class="px-4 py-3 border-b">وضعیت</th>
                        <th class="px-4 py-3 border-b">تاریخ سفارش</th>
                        <th class="px-4 py-3 border-b">مبلغ کل</th>
                        <th class="px-4 py-3 border-b">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border-b">{{ $order->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->user->name ?? '—' }}</td>
                            <td class="px-4 py-2 border-b capitalize">{{ $order->status }}</td>
                            <td class="px-4 py-2 border-b">{{ $order->created_at->format('Y/m/d') }}</td>
                            <td class="px-4 py-2 border-b">{{ number_format($order->total_price) }} تومان</td>
                            <td class="px-4 py-2 border-b flex space-x-2 rtl:space-x-reverse">
                                
                                <a href="{{ route('orders.edit', $order) }}"
                                   class="text-yellow-600 hover:underline">ویرایش</a>
                                <form action="{{ route('orders.destroy', $order) }}" method="POST"
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
            هیچ سفارشی ثبت نشده است.
        </div>
    @endif

@endsection