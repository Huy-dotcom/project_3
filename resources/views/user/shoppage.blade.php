<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
@extends('user.layouts.app')

@section('content')

    <body class="home-page home-01 ">

        <!-- mobile menu -->
        <div class="mercado-clone-wrap">
            <div class="mercado-panels-actions-wrap">
                <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
            </div>
            <div class="mercado-panels"></div>
        </div>
        <style>
            #price-filter {
                width: 90%;
                height: 30px;
                display: flex;
                margin: auto;
                padding: 4;
                background-color: #ff2832;
                color: white;
                justify-content: center;
                border: none;
                font-size: 14px;
                font-weight: bold;
            }

            #price-filter:hover {
                background-color: white;
                border: 1px solid #ff2832;
                color: #ff2832;
            }

        </style>
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
                background: #ff2832;
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
                background: #ff2832;
                pointer-events: auto;
                -webkit-appearance: none;
                border-radius: 50%;
            }

            input[type="range"]::-moz-range-thumb {
                border: none;
                height: 15px;
                width: 15px;
                background: #ff2832;
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
                        <li class="item-link"><a href="{{ route('shoppage') }}" class="link">all</a></li>
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

                                {{-- <div class="sort-item orderby ">
                                    <input type="text" name="searchbar" id="searchbar" placeholder="Tìm...">
                                    <button id="disable-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div> --}}
                                <div class="sort-item orderby ">
                                    <select name="" class="use-chosen" id="brand-list">
                                        <option value="" selected>Thương hiệu</option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="sort-item orderby ">
                                    <select name="catlist" class="use-chosen" id="cat-list">
                                        <option value="" selected>Danh mục</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
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
                        <div id="product-container">

                            @include('user.productList')

                        </div>

                    </div>



                    <!--end main products area-->

                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                        <div class="widget mercado-widget categories-widget">
                            <h2 class="widget-title">Danh mục sản phẩm</h2>
                            <div class="widget-content">

                                <ul class="list-category">
                                    @foreach ($category as $cate)
                                        <li class="category-item">
                                            <a href="?cat={{ $cate->id }}" id="cat-link"
                                                @if (isset($cat) && $cat == $cate->id) style="color:red;" @endif
                                                class="cate-link">{{ $cate->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!-- Categories widget-->



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
                                            <span></span>
                                            <input type="number" id="min" class="input-min" value="0">
                                            <h5>Tr</h5>
                                        </div>
                                        <div class="separator">-</div>
                                        <div class="field">
                                            <span></span>
                                            <input type="number" id="max" class="input-max" value="200">
                                            <h5>Tr</h5>
                                        </div>
                                    </div>
                                    <div class="slider-bar">
                                        <div class="progress"></div>
                                    </div>
                                    <div class="range-input">
                                        <input type="range" class="range-min" min="0" max="200" value="0" step="1">
                                        <input type="range" class="range-max" min="0" max="200" value="200" step="1">
                                    </div>
                                </div>
                                <button class="filter-submit" id="price-filter">lọc</button>
                            </div>
                        </div><!-- Price-->



                        <div class="widget mercado-widget widget-product">
                            <h2 class="widget-title">Sản phẩm nổi bật</h2>
                            <div class="widget-content">
                                <ul class="products">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($product as $item)
                                        <li class="product-item">
                                            <div class="product product-widget-style">
                                                <div class="thumbnnail">
                                                    <a href="{{ route('product_detail', ['id' => $item->id]) }}"
                                                        title="{{ $item->name }}">
                                                        <figure><img src="{{ asset($item->url) }}" alt=""></figure>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <a href="{{ route('product_detail', ['id' => $item->id]) }}"
                                                        class="product-name"><span>{{ \Illuminate\Support\Str::limit($item->name, 15, $end = '...') }}
                                                        </span></a>
                                                    <br>
                                                    <br>
                                                    <div class="wrap-price"><span class="product-price">
                                                            @if ($item->start_date == null)
                                                                <?php echo number_format($item->price, -3, ',', ',') . ' VND'; ?>
                                                            @else
                                                                <?php echo number_format($item->sale_price, -3, ',', ',') . ' VND'; ?>
                                                            @endif
                                                        </span></div>
                                                </div>
                                            </div>
                                        </li>
                                        @if (++$i == 5)
                                        @break
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- brand widget-->

                </div>
                <!--end sitebar-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
    <script>
        let priceGap = 1;
        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            progress = document.querySelector(".slider-bar .progress");

        priceInput.forEach(input => {
            input.addEventListener("input", e => {
                let minVal = parseInt(priceInput[0].value),
                    maxVal = parseInt(priceInput[1].value);

                if ((maxVal - minVal >= priceGap) && maxVal < 50) {
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
            $(document).on('change', '#brand-list', function() {
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

        function fetch_page(row = 9, searchbar = '', catId = '', brand = '', sort = 'default', min = '', max = '', page =
            '') {
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
            if (params)
                return [
                    $('#row').val(),
                    params.has('search') ? params.get('search') : $('#searchbar').val(),
                    params.has('cat') ? params.get('cat') : $('#cat-list').val(),
                    $('#brand-list').val(),
                    $('#product-sort-list').val(),
                    $('#min').val() + '000000',
                    $('#max').val() + '000000'
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
