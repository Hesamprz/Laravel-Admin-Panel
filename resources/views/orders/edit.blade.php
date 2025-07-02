@extends('layouts.app')

@section('title', 'ویرایش سفارش')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-indigo-700 mb-6">ویرایش سفارش</h1>

        <form action="{{ route('orders.update', $order) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="user_id" class="block mb-1 font-semibold">مشتری</label>
                <select name="user_id" id="user_id" required
                        class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="status" class="block mb-1 font-semibold">وضعیت</label>
                <input type="text" name="status" id="status" required
                       value="{{ old('status', $order->status) }}"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
                @error('status')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="total_price" class="block mb-1 font-semibold">قیمت کل</label>
                <input type="number" name="total_price" id="total_price" required step="0.01"
                       value="{{ old('total_price', $order->total_price) }}"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
                @error('total_price')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <a href="{{ route('orders.index') }}" class="px-4 py-2 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">
                    انصراف
                </a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    ذخیره تغییرات
                </button>
            </div>
        </form>
    </div>
@endsection