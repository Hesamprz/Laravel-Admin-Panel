@extends('layouts.app')

@section('title', 'ویرایش کاربر')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-indigo-700 mb-6">ویرایش کاربر</h1>

    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block mb-1 font-semibold">نام</label>
            <input type="text" name="name" id="name"
                   class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                   value="{{ old('name', $user->name) }}">
            @error('name')
                <span class="text-red-600 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email" class="block mb-1 font-semibold">ایمیل</label>
            <input type="email" name="email" id="email"
                   class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                   value="{{ old('email', $user->email) }}">
            @error('email')
                <span class="text-red-600 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password" class="block mb-1 font-semibold">رمز عبور (اگر نمی‌خواهید تغییر دهید خالی بگذارید)</label>
            <input type="password" name="password" id="password"
                   class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('password')
                <span class="text-red-600 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block mb-1 font-semibold">تکرار رمز عبور</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="w-full border-gray-300 rounded px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="flex justify-end gap-4 mt-6">
            <a href="{{ route('users.index') }}" class="px-4 py-2 rounded border border-gray-300 text-gray-600 hover:bg-gray-50">
                انصراف
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                بروزرسانی
            </button>
        </div>
    </form>
</div>
@endsection