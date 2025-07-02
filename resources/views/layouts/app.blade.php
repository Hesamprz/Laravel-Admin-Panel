<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'فروشگاه لباس')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 font-sans min-h-screen flex flex-col">

    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-2xl font-bold text-indigo-600">فروشگاه لباس</a>
        <ul class="flex space-x-6 rtl:space-x-reverse">
            <li><a href="{{ route('products.index') }}" class="hover:text-indigo-500">محصولات</a></li>
            <li><a href="{{ route('orders.index') }}" class="hover:text-indigo-500">سفارش‌ها</a></li>
            <li><a href="{{ route('users.index') }}" class="hover:text-indigo-500">کاربران</a></li>
        </ul>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    

</body>
</html>