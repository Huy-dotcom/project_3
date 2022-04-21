@extends('user.layouts.app')
@section('content')
    <style>
        .btn_back{
            display: block;
            width:70px;
            height:40px;
            padding: 10px 13px;
            color:white;
            background: yellowgreen;
            font-weight:bold;
        }
        .btn_back:hover{
            border:1px solid yellowgreen;
            background: white;
            color: yellowgreen;
        }
    </style>

<body class=" shopping-cart page ">
        <div class="detail">
            <div class="wrap-iten-in-cart" style="width:90%; align-items: center; justify-content: center; padding:50px;">
                <h3 class="box-title">Sản phẩm trong đơn hàng</h3>
                <ul class="products-cart">
                    @foreach ($products as $item)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{ asset($item->url) }}" alt=""></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product"
                              href="{{ route('product_detail', ['id' => $item->id]) }}">{{ $item->name}} <br> x{{$item->qty}}</a>
                        </div>

                        <div class="price-field sub-total"><p class="price">giá:&nbsp;
                            @if ($item->start_date == null)
                                <?php echo number_format( $item->price*$item->qty, -3, ',', ',') . ' VND'; ?>
                            @else
                                <?php echo number_format($item->sale_price*$item->qty, -3, ',', ',') . ' VND'; ?>
                            @endif
                        </p></div>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ url()->previous() }}" class="btn_back">Trở về</a>
        </div>

    @endsection
