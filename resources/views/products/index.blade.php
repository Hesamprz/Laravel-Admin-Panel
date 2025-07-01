<!DOCTYPE html>
<html>
<head>
    <title>لیست محصولات</title>
</head>
<body>
    <h1>لیست محصولات</h1>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - {{ $product->price }} تومان</li>
        @endforeach
    </ul>
</body>
</html>