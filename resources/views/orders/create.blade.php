@extends('layouts.app')

@section('title', 'ثبت سفارش جدید')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-indigo-700 mb-6">ثبت سفارش جدید</h1>

    <form action="{{ route('orders.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="user_id" class="block mb-1 font-semibold">انتخاب مشتری</label>
            <select name="user_id" id="user_id" required
                    class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- انتخاب کنید --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <span class="text-red-600 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="status" class="block mb-1 font-semibold">وضعیت سفارش</label>
            <input type="text" name="status" id="status" required
                   value="{{ old('status') }}"
                   class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
            @error('status')
                <span class="text-red-600 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="total_price" class="block mb-1 font-semibold">قیمت کل</label>
            <input type="number" step="0.01" name="total_price" id="total_price" required
                   value="{{ old('total_price', 0) }}"
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
                ثبت سفارش
            </button>
        </div>
    </form>
</div>
@endsection