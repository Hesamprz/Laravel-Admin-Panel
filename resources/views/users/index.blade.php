@extends('layouts.app')

@section('title', 'لیست کاربران')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-indigo-700">لیست کاربران</h1>
        <a href="{{ route('users.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            افزودن کاربر جدید
        </a>
    </div>

    @if($users->count())
        <div class="overflow-x-auto rounded shadow bg-white">
            <table class="min-w-full border text-sm text-right">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border-b">#</th>
                        <th class="px-4 py-3 border-b">نام</th>
                        <th class="px-4 py-3 border-b">ایمیل</th>
                        <th class="px-4 py-3 border-b">تاریخ عضویت</th>
                        <th class="px-4 py-3 border-b">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border-b">{{ $user->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->created_at->format('Y/m/d') }}</td>
                            <td class="px-4 py-2 border-b flex space-x-2 rtl:space-x-reverse">
                                
                                <a href="{{ route('users.edit', $user) }}"
                                   class="text-yellow-600 hover:underline">ویرایش</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST"
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
            هیچ کاربری ثبت نشده است.
        </div>
    @endif

@endsection