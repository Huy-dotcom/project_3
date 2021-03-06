<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@extends('user.layouts.app')
@section('content')

    <body class=" shopping-cart page ">
        <style>
            .quantity {
                display:flex;
                text-align:center;
                height:75px;
            }
            .quantity-input{
            }
            .btn-update {
                background-color: white;
                border:1px solid #ff2832;
                color: #ff2832;
                padding:3px 3px;
                height:30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 13px;
                font-weight: 600;

                transition-duration: 0.3s;
                cursor: pointer;
            }
            .btn-update:hover, .btn-update:active{
                background-color: #ff2832;
                color:white;
            }

        </style>

        <!-- mobile menu -->
        <div class="mercado-clone-wrap">
            <div class="mercado-panels-actions-wrap">
                <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
            </div>
            <div class="mercado-panels"></div>
        </div>
        <main id="main" class="main-site">

            <div class="container">

                <div class="wrap-breadcrumb">
                    <ul>
                        <li class="item-link"><a href="#" class="link">home</a></li>
                        <li class="item-link"><span>login</span></li>
                    </ul>
                </div>
                <div class=" main-content-area">

                    <div class="wrap-iten-in-cart">

                        <h3 class="box-title">Danh sách sản phẩm</h3>
                        <ul class="products-cart">
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart as $cart_item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ asset($cart_item['p_url']) }}" alt=""></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product"
                                            href="{{ route('product_detail', ['id' => $cart_item['p_id']]) }}">{{ $cart_item['p_name'] }}</a>
                                    </div>
                                    <div class="price-field produtc-price">
                                        <p class="price">

                                            <?php echo number_format($cart_item['p_price'], -3, ',', ',') . ' VND'; ?>

                                        </p>
                                    </div>
                                    <div class="quantity">
                                        <form action="{{ route('update_cart') }}" method="get">
                                            <div class="quantity-input">
                                                <input type="hidden" name="index" value="{{$loop->index}}">
                                                @foreach ($product as $item)
                                                @if ($item->id == $cart_item['p_id'])

                                                <input type="text" name="product-quatity"
                                                    value="{{ $cart_item['p_qty'] }}" data-max="{{$item->qty}}" pattern="[0-9]*" readonly>
                                                <a class="btn btn-increase" href="#"></a>
                                                <a class="btn btn-reduce" href="#"></a>
                                                @endif
                                                @endforeach
                                            </div>
                                            <button type="submit" class="btn-update">cập nhật</button>
                                            {{-- <a href="" class="btn-update">cập nhật</a> --}}
                                        </form>
                                    </div>
                                    <div class="price-field sub-total">
                                        <p class="price"> <?php echo number_format($cart_item['p_price'] * $cart_item['p_qty'], -3, ',', ',') . ' VND'; ?></p>
                                    </div>
                                    {{-- <div class="price-field produtc-price">
                                        <a href="" class="btn-update">cập nhật</a>
                                    </div> --}}
                                    <div class="delete">
                                        {{-- <a href="{{ route('delete_cart_item', ['id' => $cart_item['p_id']]) }}" class="btn-delete">xóa</a> --}}
                                        {{-- <a href="{{ route('delete_cart_item', ['id' => $cart_item['p_id']]) }}">

                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a> --}}
                                        <a href="{{ route('delete_cart_item', ['id' => $loop->index]) }}">

                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                                @php
                                    $total += $cart_item['p_price'] * $cart_item['p_qty'];
                                @endphp
                            @endforeach

                            {{-- <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="assets/images/products/digital_20.jpg" alt=""></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="#">Radiant-360 R6 Wireless Omnidirectional Speaker [White]</a>
                        </div>
                        <div class="price-field produtc-price"><p class="price">$256.00</p></div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*">
                                <a class="btn btn-increase" href="#"></a>
                                <a class="btn btn-reduce" href="#"></a>
                            </div>
                        </div>
                        <div class="price-field sub-total"><p class="price">$256.00</p></div>
                        <div class="delete">
                            <a href="#" class="btn btn-delete" title="">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li> --}}
                        </ul>
                        {{-- {{ $products->links('pagination::bootstrap-4') }} --}}
                    </div>

                    <div class="summary">
                        <div class="order-summary">
                            <h4 class="title-box">sơ lược đơn hàng</h4>
                            <p class="summary-info"><span class="title">Tổng giá sản phẩm</span><b
                                    class="index" id="total-product-price">@php echo number_format($total ,-3,',',',') . ' VND'; @endphp</b></p>
                            <p class="summary-info"><span class="title">Phí giao hàng</span><b
                                    class="index">Miễn phí</b></p>
                            <p class="summary-info total-info "><span class="title">Tổng</span><b
                                    class="index" id="total-price">@php echo number_format($total ,-3,',',',') . ' VND'; @endphp</b></p>
                        </div>
                        <div class="checkout-info">
                            {{-- <label class="checkbox-field">
                        <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                    </label> --}}
                            <a class="btn btn-checkout" href="{{ route('checkout') }}">Check out</a>
                            <a class="link-to-shop" href="shop.html">Mua sắm tiếp<i class="fa fa-arrow-circle-right"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="update-clear">
                            {{-- <a class="btn btn-clear" href="#">Làm trống giỏ hàng</a> --}}
                            {{-- <a class="btn btn-update" href="{{ route('homepage') }}">trang chủ</a> --}}
                        </div>
                    </div>


                </div>
                <!--end main content area-->
            </div>
            <!--end container-->

        </main>
    @endsection
    <script>
        $(document).ready(function() {
            $(document).on('input', '#quantity_val', function() {


                if (parseInt($("#quantity_val").val()) > parseInt($("#quant").val()) ){
                    $("#quantity_val").val($("#quant").val());
                }

            });
        });
    </script>
