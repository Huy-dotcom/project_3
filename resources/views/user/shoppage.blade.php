<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@extends('user.layouts.app')

@section('content')
    <style>
        .wrapper {
            width: 100%;
            background: #fff;
            padding: 20px 25px 40px;
        }

        .price-input {
            width: 100%;
            display: flex;
            margin: 30px 0 35px;
        }

        .price-input .field {
            height: 45%;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .field input {
            width: 100%;
            height: 100%;
            margin-left: 12px;
            border: 1px solid #999;
            outline: none;
            border-radius: 5px;
            text-align: center;
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        .price-input .separator {
            width: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slider-bar {
            height: 5px;
            border-radius: 5px;
            background: #ddd;
            position: relative;
        }

        .slider-bar .progress {
            height: 5px;
            border-radius: 5px;
            background: red;
            position: absolute;
            left: 0%;
            right: 0%;
        }

        .range-input {
            position: relative;
        }

        .range-input input {
            position: absolute;
            top: -5px;
            height: 5px;
            width: 100%;
            pointer-events: none;
            -webkit-appearance: none;
            background: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            height: 15px;
            width: 15px;
            background: red;
            pointer-events: auto;
            -webkit-appearance: none;
            border-radius: 50%;
        }

        input[type="range"]::-moz-range-thumb {
            border: none;
            height: 15px;
            width: 15px;
            background: red;
            pointer-events: auto;
            -moz-appearance: none;
            border-radius: 50%;
        }

    </style>

    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('homepage') }}" class="link">home</a></li>
                    <li class="item-link"><a href="{{ route('shoppage') }}" class="link">shop</a></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                    <div class="banner-shop">
                        <a href="#" class="banner-link">
                            <figure><img src="{{ asset('assets') }}/images/custom/banner9.jpg" alt=""></figure>
                        </a>
                    </div>

                    <div class="wrap-shop-control">

                        <h1 class="shop-title">Sản phẩm
                            @if (isset($catId))
                                @foreach ($category as $cat)
                                    @if ($catId == $cat->id)
                                        -&nbsp;{{ $cat->name }}
                                    @endif
                                @endforeach
                            @endif

                        </h1>

                        <div class="wrap-right">
                            <div class="sort-item orderby ">
                                <input type="text" name="searchbar" id="searchbar"
                                    placeholder="Search here...">
                                <button id="disable-btn"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>
                        </div>

                            <div class="sort-item orderby ">
                                <select name="catlist" class="use-chosen" id="cat-list">
                                    <option value="" selected>Toàn bộ</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sort-item orderby">
                                Sắp xếp: &nbsp;
                                <select name="sort" class="use-chosen" id="product-sort-list">
                                    <option value="default">
                                        Mặc định
                                    </option>
                                    <option value="date">
                                        Mới nhất
                                    </option>
                                    <option value="price">
                                        Theo giá: thấp đến cao
                                    </option>
                                    <option value="price-desc">
                                        Theo giá: cao đến thấp
                                    </option>
                                </select>
                            </div>


                            {{-- <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" >
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="18">18 per page</option>
                                <option value="21">21 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                                <option value="32">32 per page</option>
                            </select>
                        </div> --}}

                            {{-- <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div> --}}

                        </div>

                    </div>
                    <!--end wrap shop control-->

                        @include('user.productList')
                </div>


                <!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title">Danh mục sản phẩm</h2>
                        <div class="widget-content">
                            <ul class="list-category">
                                @foreach ($category as $cate)
                                    <li class="category-item">
                                        <a href="?cat={{$cate->id}}" id="cat-link"
                                            @if (isset($cat) && $cat == $cate->id) style="color:red;" @endif
                                            class="cate-link">{{ $cate->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- Categories widget-->

                    <div class="widget mercado-widget filter-widget brand-widget">
                        <h2 class="widget-title">Thương Hiệu</h2>
                        <div class="widget-content">
                            <ul class="list-style vertical-list list-limited" data-show="6">
                                <li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
                                <li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
                                <li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
                                <li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                                <li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
                                <li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a>
                                </li>
                                <li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a>
                                </li>
                                <li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a>
                                </li>
                                <li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a>
                                </li>
                                <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone &
                                        Tablets</a></li>
                                <li class="list-item"><a
                                        data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>'
                                        class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- brand widget-->

                    <div class="widget mercado-widget filter-widget price-filter">
                        <h2 class="widget-title">Lọc theo giá</h2>
                        <div class="widget-content">
                            {{-- <div id="slider-range"></div>
                        <p>
                            <label for="amount">Price:</label>
                            <input type="text" id="amount" readonly>

                        </p> --}}
                            <div class="wrapper">
                                <div class="price-input">
                                    <div class="field">
                                        <span>từ</span>
                                        <input type="number" id="min" class="input-min" value="0">
                                    </div>
                                    <div class="separator">-</div>
                                    <div class="field">
                                        <span>đến</span>
                                        <input type="number" id="max" class="input-max" value="50000000">
                                    </div>
                                </div>
                                <div class="slider-bar">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="50000000" value="0"
                                        step="100000">
                                    <input type="range" class="range-max" min="0" max="50000000" value="50000000"
                                        step="100000">
                                </div>
                            </div>
                            <button class="filter-submit" id="price-filter">lọc</button>
                        </div>
                    </div><!-- Price-->

                    {{-- <div class="widget mercado-widget filter-widget">
                        <h2 class="widget-title">Color</h2>
                        <div class="widget-content">
                            <ul class="list-style vertical-list has-count-index">
                                <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a>
                                </li>
                                <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a>
                                </li>
                                <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a>
                                </li>
                                <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a>
                                </li>
                                <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a>
                                </li>
                                <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Color -->

                    <div class="widget mercado-widget filter-widget">
                        <h2 class="widget-title">Size</h2>
                        <div class="widget-content">
                            <ul class="list-style inline-round ">
                                <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                                <li class="list-item"><a class="filter-link " href="#">M</a></li>
                                <li class="list-item"><a class="filter-link " href="#">l</a></li>
                                <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                            </ul>
                            <div class="widget-banner">
                                <figure><img src="{{ asset('assets') }}/images/size-banner-widget.jpg" width="270"
                                        height="331" alt=""></figure>
                            </div>
                        </div>
                    </div><!-- Size -->

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="{{ asset('assets') }}/images/products/digital_01.jpg"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional
                                                    Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="{{ asset('assets') }}/images/products/digital_17.jpg"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="{{ asset('assets') }}/images/products/digital_18.jpg"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img src="{{ asset('assets') }}/images/products/digital_20.jpg"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div><!-- brand widget--> --}}

                </div>
                <!--end sitebar-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
    <script>
        let priceGap = 1000000;
        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            progress = document.querySelector(".slider-bar .progress");

        priceInput.forEach(input => {
            input.addEventListener("input", e => {
                let minVal = parseInt(priceInput[0].value),
                    maxVal = parseInt(priceInput[1].value);

                if ((maxVal - minVal >= priceGap) && maxVal < 50000000) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minVal;
                        progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    } else {
                        rangeInput[1].value = maxVal;
                        progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                    }
                }

            });
        });
        rangeInput.forEach(input => {
            input.addEventListener("input", e => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if ((maxVal - minVal) < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }

            });
        });
    </script>

    <script type="text/javascript">
        const params = new URLSearchParams(window.location.search)
        $(function() {

            // fetch data when search
            $(document).on('input', '#searchbar', function() {
                fetch_page(...get_search());
            });
            // fetch data when choose category
            $(document).on('change', '#cat-list', function() {
                fetch_page(...get_search());
            });
            // fetch data when choose subject
            $(document).on('change', '#product-sort-list', function() {
                fetch_page(...get_search());
            });
            // fetch data when choose teacher
            $(document).on('click', '#price-filter', function(e) {
                e.preventDefault();
                fetch_page(...get_search());
            });
            // fetch data when switch page
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetch_page(...get_search(), page);
            });
            // fetch data when click search button
            $(document).on('click', '#disable-btn', function(e) {
                e.preventDefault();
                fetch_page(...get_search());
            });
        });

        function fetch_page(row = 3, searchbar = '', catId = '', brand = '', sort = 'default', min = '', max = '', page = 1) {
            let url =
                `{{ route('shoppage') }}?row=${row}&searchbar=${searchbar}&catlist=${catId}&brand=${brand}&sort=${sort}&min=${min}&max=${max}&page=${page}`;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    $('#product-container').html(res.html);
                    $('[data-toggle="tooltip"]').tooltip();
                },
                error: function(res) {
                    let error = res.responseJSON;
                    // redirect if unauthenticate
                    if (error.hasOwnProperty('url')) {}
                }
            });
        }

        function get_search() {
            if(params)
            return [
                $('#row').val(),
                params.has('search') ? params.get('search') : $('#searchbar').val(),
                params.has('cat') ? params.get('cat') : $('#cat-list').val(),
                $('#brand-list').val(),
                $('#product-sort-list').val(),
                $('#min').val(),
                $('#max').val()
            ];
        }
        // function get_search() {
        //     if(params)
        //     return [
        //         $('#row').val(),
        //         $('#searchbar').val(),
        //         $('#cat-list').val(),
        //         $('#brand-list').val(),
        //         $('#product-sort-list').val(),
        //         $('#min').val(),
        //         $('#max').val()
        //     ];
        // }
    </script>

@endsection
