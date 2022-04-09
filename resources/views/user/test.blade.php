<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @foreach (session()->get('cart') as $cart_item_name =>$cart_item_value)

        {{ print_r( $cart_item_name) }} => {{ print_r( $cart_item_value) }} <br>--}}


    {{-- @endforeach --}}
    @foreach ($cart as $item)
        {{ $item['p_id'] }} <br>
        {{ $item['p_name'] }} <br>
        {{ $item['p_price'] }} <br>
        {{ $item['p_qty'] }} <br>
        {{ $item['p_url'] }} <br>


    @endforeach
    {{-- {{print_r($cart)}}
    {{ dd($cart) }} --}}
</body>
</html>

