@extends('user.layouts.app')
@section('content')

<body class="home-page home-01 ">
    <script>
        function truncate(str, n){
            return (str.length > n) ? str.substr(0, n-1) + '&hellip;' : str;
        };
    </script>
	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

    <main id="main">
        <div class="container">

            <!--MAIN SLIDE-->
            <div class="wrap-main-slide">
                <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                    data-dots="false">
                    <div class="item-slide">
                        <img src="{{ asset('assets') }}/images/custom/banner6.jpg" alt="" class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title" style="color: white">Máy tính <b style="color: rgb(187, 255, 0)">Công nghệ cao</b>
                            </h2>
                            <span class="subtitle" style="color: rgba(30, 230, 187, 0.733)">Chơi game, lập trình đồ họa,.. đều dễ dàng thực hiện.</span>
                            <p class="sale-info" style="color: rgb(30, 230, 187)">Mức giá hợp lý
                                {{-- <span class="price">$59.99</span></p> --}}
                            <a href="{{ route('shoppage') }}" class="btn-link">Mua ngay</a>
                        </div>
                    </div>
                    <div class="item-slide">
                        <img src="{{ asset('assets') }}/images/custom/banner7.webp" alt="" class="img-slide">
                        <div class="slide-info slide-2">
                            <h2 class="f-title">sale tới&nbsp;25%</h2>
                            <span class="f-subtitle" style="color: white">Khi thanh toán online</span>
                            <p class="discount-code">#FA6868</p>
                            <h4 class="s-title" style="color: lawngreen">Nhập ngay</h4>
                            <p class="s-subtitle">Để được giảm thêm 3%</p>
                        </div>
                    </div>
                    <div class="item-slide">
                        <img src="{{ asset('assets') }}/images/custom/banner8.jpg" alt="" class="img-slide">
                        <div class="slide-info slide-3">
                            <h2 class="f-title" style="color: white">đa dạng<b style="color: red">linh kiện máy tính</b></h2>
                            <span class="f-subtitle" style="color: cornsilk">từ nhiều thương hiệu nổi tiếng</span>
                            <p class="sale-info">chỉ từ<b class="price">&nbsp; 30,000 VND</b></p>
                            <a href="#" class="btn-link">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--BANNER-->
            {{-- <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset('assets')}}/images/home-1-banner-1.jpg" alt="" width="580" height="190"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset('assets')}}/images/home-1-banner-2.jpg" alt="" width="580" height="190"></figure>
                </a>
            </div>
        </div> --}}

            <!--On Sale-->
            <div class="wrap-show-advance-info-box style-1 has-countdown" style="width: 100%">
                <h3 class="title-box">On Sale</h3>
                {{-- <div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div> --}}
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container "
                    data-items="{{ $saleListCount }}" data-loop="false" data-nav="true" data-dots="false"
                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    {{-- loop sale item --}}
                    @foreach ($saleList as $salelist)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail" style="display: inline-block; width: 213px; height: 213px;">
                                <a href="{{ route('product_detail', ['id'=>$salelist->id]) }}" title="{{ $salelist->name }}">
                                    <figure><img src="{{ asset($salelist->url) }}" width="800" height="800"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="{{ route('product_detail', ['id'=>$salelist->id]) }}" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('product_detail', ['id'=>$salelist->id]) }}" class="product-name"><span>{{ \Illuminate\Support\Str::limit($salelist->name , 25, $end='...') }}</span></a>
                                <div class="wrap-price"><span class="product-price"><span
                                            style="text-decoration: line-through">Giá:&nbsp; <?php echo number_format($salelist->price, -3, ',', ',') . ' VND'; ?>&#8363;</span><br>
                                        <span>Chỉ còn:&nbsp; <?php echo number_format($salelist->sale_price, -3, ',', ',') . ' VND'; ?></span></span></div>
                            </div>
                        </div>
                        @if ($loop->index > 5)
                        @break
                    @endif
                @endforeach
            </div>
        </div>

        <!--banner-->
        <div class="wrap-show-advance-info-box style-1" style="width: 100%">
            <h3 class="title-box">Linh kiên máy tính - lắp ráp miễn phí!</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets') }}/images/custom/banner1.png" width="1170" height="240"
                            alt="">
                    </figure>
                </a>
            </div>
        </div>

        {{-- lastest product --}}
        <div class="wrap-show-advance-info-box style-1" style="width: 100%">
            <h3 class="title-box">Sản phẩm mới nhất</h3>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="{{ $productInOrderCount }}" data-loop="false" data-nav="true"
                                data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                @foreach ($productInOrder as $PID)
                                    <div class="product product-style-2 equal-elem " style="position: absolutely">
                                        <div class="product-thumnail"
                                            style="display: inline-block; width: 213px; height: 213px;">
                                            <a href="{{ route('product_detail', ['id'=>$PID->id]) }}" title="{{ $PID->name }}">
                                                <figure><img src="{{ asset($PID->url) }}" width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product_detail', ['id'=>$PID->id]) }}" class="product-name"><span>{{ \Illuminate\Support\Str::limit($PID->name , 25, $end='...') }}</span></a>
                                            <div class="wrap-price" style="position: relative; bottom: 10px">
                                                @if ($PID->start_date == null)
                                                    <div class="wrap-price"><span
                                                            class="product-price">Giá:&nbsp;<?php echo number_format($PID->price, -3, ',', ',') . ' VND'; ?>&#8363;</span>
                                                    </div>
                                                @else
                                                    <div class="warp-price"><span class="product-price"
                                                            style="text-decoration: line-through">Giá:
                                                            &nbsp;<?php echo number_format($PID->price, -3, ',', ',') . ' VND'; ?></span><br>
                                                        <span class="product-price">chỉ còn: &nbsp;
                                                            <?php echo number_format($PID->sale_price, -3, ',', ',') . ' VND'; ?></span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1" style="width: 100%">
            <h3 class="title-box">Quảng cáo</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets') }}/images/custom/banner_job_lang1.jpg" width="1170"
                            height="240" alt=""></figure>
                </a>
            </div>
        </div>
        <div class="wrap-show-advance-info-box style-1" style="width: 100%">
            <h3 class="title-box">Danh mục sản phẩm</h3>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        <a href="#fashion_all" class="tab-control-item active">All</a>
                        @foreach ($category as $cat)
                            <a href="#fashion_{{ $cat->id }}"
                                class="tab-control-item @if (Request::is('home/fashion_{{ $cat->id }}')) active @endif
                        ">{{ $cat->name }}</a>
                        @endforeach
                        {{-- <a href="#fashion_1a" class="tab-control-item active">ádsasa</a>
                    <a href="#fashion_1b" class="tab-control-item">Watch</a>
                    <a href="#fashion_1c" class="tab-control-item">Laptop</a>
                    <a href="#fashion_1d" class="tab-control-item">Tablet</a> --}}
                        {{-- Request::is('home') --}}
                    </div>
                    <div class="tab-contents">

                        <div class="tab-content-item active" id="fashion_all">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="{{ $productInOrderCount }}" data-loop="false" data-nav="true"
                                data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($productInOrder as $product)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail"
                                            style="display: inline-block; width: 213px; height: 213px;">
                                            <a href="{{ route('product_detail', ['id'=>$product->id]) }}" title="{{ $product->name }}">
                                                <figure><img src="{{ asset($product->url) }}" width="800"
                                                        height="800"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="{{ route('product_detail', ['id'=>$product->id]) }}" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product_detail', ['id'=>$product->id]) }}" class="product-name"><span>{{ \Illuminate\Support\Str::limit($product->name , 25, $end='...') }}</span></a>
                                            <div class="wrap-price">
                                                @if ($product->start_date == null)
                                                <div class="wrap-price"><span class="product-price">Giá:&nbsp; <?php  echo number_format($product->price,-3,',',',') . ' VND'; ?>&#8363;</span></div>
                                            @else
                                                <div class="warp-price"><span class="product-price" style="text-decoration: line-through">Giá: &nbsp;<?php  echo number_format($product->price,-3,',',',') . ' VND'; ?></span><br>
                                                    <span class="product-price">chỉ còn: &nbsp; <?php  echo number_format($product->sale_price,-3,',',',') . ' VND'; ?></span></div>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        @foreach ($category as $cat)
                            <div class="tab-content-item" id="fashion_{{ $cat->id }}">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="{{ $productInOrderCount }}" data-loop="false" data-nav="true"
                                    data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    @foreach ($productInOrder as $product)
                                        @if ($cat->id == $product->category_id)
                                            <div class="product product-style-2 equal-elem ">
                                                <div class="product-thumnail"
                                                    style="display: inline-block; width: 213px; height: 213px;">
                                                    <a href="{{ route('product_detail', ['id'=>$product->id]) }}" title="{{ $product->name }}">
                                                        <figure><img src="{{ asset($product->url) }}" width="800"
                                                                height="800"></figure>
                                                    </a>
                                                    <div class="group-flash">
                                                        <span class="flash-item new-label">new</span>
                                                    </div>
                                                    <div class="wrap-btn">
                                                        <a href="{{ route('product_detail', ['id'=>$product->id]) }}" class="function-link">quick view</a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <a href="{{ route('product_detail', ['id'=>$product->id]) }}"
                                                        class="product-name"><span>{{ \Illuminate\Support\Str::limit($product->name , 25, $end='...') }}</span></a>
                                                    <div class="wrap-price">
                                                        @if ($product->start_date == null)
                                                        <div class="wrap-price"><span class="product-price">Giá:&nbsp;<?php  echo number_format($product->price,-3,',',',') . ' VND'; ?>&#8363;</span></div>
                                                    @else
                                                        <div class="warp-price"><span class="product-price" style="text-decoration: line-through">Giá: &nbsp;<?php  echo number_format($product->price,-3,',',',') . ' VND'; ?></span><br>
                                                            <span class="product-price">chỉ còn: &nbsp; <?php  echo number_format($product->sale_price,-3,',',',') . ' VND'; ?></span></div>
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
@endsection
