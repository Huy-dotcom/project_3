@extends('user.layouts.app')
@section('content')
    <main id="main">
        <div class="container">

            <!--MAIN SLIDE-->
            <div class="wrap-main-slide">
                <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                    data-dots="false">
                    <div class="item-slide">
                        <img src="{{ asset('assets') }}/images/custom/banner6.jpg" alt="" class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title" style="color: white">High tech <b style="color: white">Computer</b>
                            </h2>
                            <span class="subtitle" style="color: white">gamming, programing,.. all in one!.</span>
                            <p class="sale-info" style="color: white">Only for: <span
                                    class="price">$59.99</span></p>
                            <a href="#" class="btn-link">Shop Now</a>
                        </div>
                    </div>
                    <div class="item-slide">
                        <img src="{{ asset('assets') }}/images/custom/banner7.webp" alt="" class="img-slide">
                        <div class="slide-info slide-2">
                            <h2 class="f-title">Extra 25% Off</h2>
                            <span class="f-subtitle" style="color: white">On online payments</span>
                            <p class="discount-code">Use Code: #FA6868</p>
                            <h4 class="s-title" style="color: lawngreen">Get Free</h4>
                            <p class="s-subtitle">With only $3 per mounth for installment!</p>
                        </div>
                    </div>
                    <div class="item-slide">
                        <img src="{{ asset('assets') }}/images/custom/banner8.jpg" alt="" class="img-slide">
                        <div class="slide-info slide-3">
                            <h2 class="f-title" style="color: white">The ultimate <b style="color: red">Exclusive
                                    mini gaming PC</b></h2>
                            <span class="f-subtitle" style="color: cornsilk">Light and small, easy to install, powerful
                                core.</span>
                            <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
                            <a href="#" class="btn-link">Shop Now</a>
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
                                <a href="detail.html" title="{{$salelist->name}}">
                                    <figure><img src="{{ asset($salelist->url) }}" width="800"
                                            height="800"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{ $salelist->name }}</span></a>
                                <div class="wrap-price"><span class="product-price"><span
                                            style="text-decoration: line-through">{{ $salelist->price }}&#8363;</span>
                                        <span>->{{ $salelist->sale_price }}</span></span></div>
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
                    <figure><img src="{{ asset('assets') }}/images/custom/banner1.png" width="1170" height="240" alt="">
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
                                data-items="{{$productInOrderCount}}" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                @foreach ($productInOrder as $PID)
                                    <div class="product product-style-2 equal-elem " style="position: absolutely">
                                        <div class="product-thumnail" style="display: inline-block; width: 213px; height: 213px;">
                                            <a href="detail.html" title="{{ $PID->name }}">
                                                <figure><img src="{{ asset($PID->url) }}"
                                                        width="800" height="800"
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
                                            <a href="#" class="product-name"><span>{{ $PID->name }}</span></a>
                                            <div class="wrap-price" style="position: relative; bottom: 10px"><span
                                                    class="product-price">{{ $PID->price }}</span></div>
                                        </div>
                                    </div>
                                    @if ($loop->index > 5)
                                        @break
                                    @endif
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
                    <a href="#fashion_{{$cat->id}}" class="tab-control-item @if (Request::is('home/fashion_{{ $cat->id }}') )
                        active
                    @endif
                        ">{{$cat->name}}</a>
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
                            data-items="{{$productInOrderCount}}" data-loop="false" data-nav="true" data-dots="false"
                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                            @foreach ($productInOrder as $product)

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail" style="display: inline-block; width: 213px; height: 213px;">
                                    <a href="detail.html" title="{{ $product->name }}">
                                        <figure><img src="{{ asset($product->url) }}"
                                                width="800" height="800" ></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>{{ $product->name }}</span></a>
                                    <div class="wrap-price"><span class="product-price">{{ ($product->sale_price == 0) ? $product->price : $product->price }}</span></div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    @foreach ($category as $cat)

                        <div class="tab-content-item" id="fashion_{{$cat->id}}">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="{{$productInOrderCount}}" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($productInOrder as $product)
                                    @if ($cat->id == $product->category_id)

                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail" style="display: inline-block; width: 213px; height: 213px;">
                                        <a href="detail.html" title="{{ $product->name }}">
                                            <figure><img src="{{ asset($product->url) }}"
                                                    width="800" height="800" ></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{ $product->name }}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{ ($product->sale_price == 0) ? $product->price : $product->price }}</span></div>
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
