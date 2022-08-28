<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "112931581516958");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v14.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@extends('user.layouts.app')
@section('content')
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('homepage') }}" class="link">home</a></li>
                    <li class="item-link"><span>detail</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">

                        <div class="detail-media">
                            <div class="product-gallery">
                                <img src="{{ asset($productDetail->url) }}" alt="product thumbnail" />
                                {{-- <ul class="slides">

                            <li data-thumb="{{asset('assets')}}/images/products/digital_18.jpg">
                                <img src="{{asset('assets')}}/images/products/digital_18.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{asset('assets')}}/images/products/digital_17.jpg">
                                <img src="{{asset('assets')}}/images/products/digital_17.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{asset('assets')}}/images/products/digital_15.jpg">
                                <img src="{{asset('assets')}}/images/products/digital_15.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{asset('assets')}}/images/products/digital_02.jpg">
                                <img src="{{asset('assets')}}/images/products/digital_02.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{asset('assets')}}/images/products/digital_08.jpg">
                                <img src="{{asset('assets')}}/images/products/digital_08.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{asset('assets')}}/images/products/digital_10.jpg">
                                <img src="{{asset('assets')}}/images/products/digital_10.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{asset('assets')}}/images/products/digital_12.jpg">
                                <img src="{{asset('assets')}}/images/products/digital_12.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="{{asset('assets')}}/images/products/digital_14.jpg">
                                <img src="{{asset('assets')}}/images/products/digital_14.jpg" alt="product thumbnail" />
                            </li>

                          </ul> --}}
                            </div>
                        </div>
                        <div class="detail-info">
                            {{-- <div class="product-rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <a href="#" class="count-review">(05 review)</a>
                        </div> --}}
                            <h2 class="product-name">{{ $productDetail->name }}</h2>
                            <div class="short-desc">
                                Từ:&nbsp; {{ $brand->name }}
                            </div>
                            {{-- <div class="short-desc">
                            <ul>
                                <li>7,9-inch LED-backlit, 130Gb</li>
                                <li>Dual-core A7 with quad-core graphics</li>
                                <li>FaceTime HD Camera 7.0 MP Photos</li>
                            </ul>
                        </div> --}}
                            {{-- <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{asset('assets')}}/images/social-list.png" alt=""></a>
                        </div> --}}
                            <div class="wrap-price">
                                @if ($productDetail->start_date == null)
                                    <span class="product-price">&nbsp;<?php echo number_format($productDetail->price, -3, ',', ',') . ' VND'; ?></span>
                                @else
                                    <span class="product-price" style="text-decoration: line-through">Giá:
                                        &nbsp;<?php echo number_format($productDetail->price, -3, ',', ',') . ' VND'; ?></span><br>
                                    <span class="product-price">chỉ còn: &nbsp; <?php echo number_format($productDetail->sale_price, -3, ',', ',') . ' VND'; ?></span>
                                @endif
                            </div>
                            <div class="stock-info in-stock">
                                <p class="availability">Số dư: <b>{{ $productDetail->qty }}</b></p>
                                <input type="hidden" id="quant" value="{{ $productDetail->qty }}">
                            </div>
                            {{-- <form action="{{ route('add_to_cart') }}" method="GET"> --}}
                            <input type="hidden" class="p_price"
                                value="{{ isset($productDetail->start_date) ? $productDetail->sale_price : $productDetail->price }}">
                            <input type="hidden" class="p_id" value="{{ $productDetail->id }}">
                            <input type="hidden" class="p_name" value="{{ $productDetail->name }}">
                            <input type="hidden" class="p_img" value="{{ $productDetail->url }}">
                            <div class="quantity">

                                <span>Số lượng đặt:</span>
                                <div class="quantity-input">
                                    <input type="text" id="quantity_val" class="p_qty" name="product-quatity"
                                        value="1" data-max="{{ $productDetail->qty }}" pattern="[0-9]*">

                                    <a class="btn btn-reduce" href="#"></a>
                                    <a class="btn btn-increase" href="#"></a>
                                </div>
                            </div>
                            <div class="wrap-butons">
                                {{-- <a type="submit" onclick="this.closest('form').submit();return false;"
                                        class="btn add-to-cart">Thêm vào giỏ</a> --}}
                                <a href="#" class="btn add-to-cart btn_addtocart">Thêm vào giỏ</a>
                                {{-- <button class="btn_addtocart">THÊM VÀO GIỎ</button> --}}
                                {{-- <div class="wrap-btn">
                                    <a href="#" class="btn btn-compare">Add Compare</a>
                                    <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                                    </div> --}}
                            </div>
                            {{-- </form> --}}
                        </div>
                        <div class="advance-info">
                            <div class="tab-control normal">
                                <a href="#description" class="tab-control-item active">Thông số sản phẩm</a>
                                {{-- <a href="#add_infomation" class="tab-control-item">thông tin thêm</a> --}}
                                <a href="#review" class="tab-control-item">bình luận</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="description">
                                    <p>
                                        {!! $productDetail->description !!}
                                    </p>
                                </div>
                                {{-- <div class="tab-content-item " id="add_infomation">
                                    Chưa cập nhật
                                     <table class="shop_attributes">
                                    <tbody>
                                        <tr>
                                            <th>Weight</th><td class="product_weight">1 kg</td>
                                        </tr>
                                        <tr>
                                            <th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div> --}}
                                <div class="tab-content-item " id="review">

                                    <div class="wrap-review-form">

                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">{{ $commentCount }} bình luận</h2>
                                            <ol class="commentlist">
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                    id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        @foreach ($comments as $comment)
                                                            <img alt=""
                                                                src="{{ asset('assets') }}/images/custom/default_user_ava.png"
                                                                height="80" width="80">
                                                            <div class="comment-text">
                                                                <div class="star-rating">
                                                                    <span class="width-80-percent">Rated <strong
                                                                            class="rating">5</strong> out of
                                                                        5</span>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong
                                                                        class="woocommerce-review__author">{{ $comment->name }}</strong>
                                                                    <span class="woocommerce-review__dash">–</span>
                                                                    <time class="woocommerce-review__published-date"
                                                                        datetime="{{ $comment->created_at }}">{{ $comment->created_at }}</time>
                                                                </p>
                                                                <div class="description">
                                                                    <p>{{ $comment->content }}</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ol>
                                        </div><!-- #comments -->

                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">

                                                    <form action="{{ route('comment') }}" method="get" id="commentform"
                                                        class="comment-form" novalidate="">
                                                        <p class="comment-notes">
                                                            bạn cần đăng nhập để có thể bình luận!<span
                                                                class="required"></span>
                                                        </p>
                                                        {{-- <div class="comment-form-rating">
                                                        <span>Your rating</span>
                                                        <p class="stars">

                                                            <label for="rated-1"></label>
                                                            <input type="radio" id="rated-1" name="rating" value="1">
                                                            <label for="rated-2"></label>
                                                            <input type="radio" id="rated-2" name="rating" value="2">
                                                            <label for="rated-3"></label>
                                                            <input type="radio" id="rated-3" name="rating" value="3">
                                                            <label for="rated-4"></label>
                                                            <input type="radio" id="rated-4" name="rating" value="4">
                                                            <label for="rated-5"></label>
                                                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                                                        </p>
                                                    </div> --}}
                                                        {{-- <p class="comment-form-author">
                                                        <label for="author">Tên <span class="required">*</span></label>
                                                        <input id="author" name="author" type="text" value="">

                                                    </p> --}}
                                                        {{-- <p class="comment-form-email">
                                                        <label for="email">Email <span class="required">*</span></label>
                                                        <input id="email" name="email" type="email" value="" >
                                                    </p> --}}
                                                        <p class="comment-form-comment">
                                                            <label for="comment">Bình luận của bạn <span
                                                                    class="required"></span>
                                                            </label>
                                                            <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                                            <input type="hidden" name="id"
                                                                value="{{ $productDetail->id }}">
                                                        </p>
                                                        <p class="form-submit">
                                                            <input name="submit" type="submit" id="submit"
                                                                class="submit" value="đăng">
                                                        </p>
                                                    </form>

                                                </div><!-- .comment-respond-->
                                            </div><!-- #review_form -->
                                        </div><!-- #review_form_wrapper -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget widget-our-services ">
                        <div class="widget-content">
                            <ul class="our-services">

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Giao hàng miễn phí!</b>
                                            <span class="subtitle">cho những sản phẩm trên 20tr</span>
                                            {{-- <p class="desc"></p> --}}
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Ưu đãi đặc biệt!</b>
                                            <span class="subtitle">Khi đặt nhiều sản phẩm</span>
                                            {{-- <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p> --}}
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Hoàn trả</b>
                                            <span class="subtitle">trong 7 ngày</span>
                                            {{-- <p class="desc"></p> --}}
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Categories widget-->

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($products as $item)
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
                                                    class="product-name"><span>{{ \Illuminate\Support\Str::limit($item->name, 15, $end = '...') }}</span></a>
                                                <div class="wrap-price"><span class="product-price">
                                                        @if ($item->start_date == null)
                                                            <?php echo number_format($item->price, -3, ',', ',') . ' VND'; ?>
                                                        @else
                                                            <?php echo number_format($item->sale_price, -3, ',', ',') . ' VND'; ?>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @if (++$i == 5)
                                    @break
                                @endif
                            @endforeach


                        </ul>
                    </div>
                </div>

            </div>
            <!--end sitebar-->

            {{-- <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets')}}/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets')}}/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets')}}/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets')}}/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item bestseller-label">Bestseller</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets')}}/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets')}}/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets')}}/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{asset('assets')}}/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item bestseller-label">Bestseller</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                        </div>
                    </div><!--End wrap-products-->
                </div>
            </div> --}}

        </div>
        <!--end row-->

    </div>
    <!--end container-->

</main>
<script>
    $(document).ready(function() {
        $('.btn_addtocart').click(function(e) {
            e.preventDefault();
            var p_id = $(this).closest('.wrap-product-detail').find('.p_id').val();
            var p_name = $(this).closest('.wrap-product-detail').find('.p_name').val();
            var p_qty = $(this).closest('.wrap-product-detail').find('.p_qty').val();
            var p_img = $(this).closest('.wrap-product-detail').find('.p_img').val();
            var p_price = $(this).closest('.wrap-product-detail').find('.p_price').val();
            data = {
                'id': p_id,
                'name': p_name,
                'product-quatity': p_qty,
                'url': p_img,
                'price': p_price,
            };
            $.ajax({
                type: "GET",
                url: "{{ route('add_to_cart') }}",
                data: data,
                success: function(response) {
                    alert(response)
                }
            });

        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('input', '#quantity_val', function() {
            if(isNaN($("#quantity_val").val()) ){
                $("#quantity_val").val(1);
            }
            if (parseInt($("#quantity_val").val()) > parseInt($("#quant").val()) ){
                $("#quantity_val").val($("#quant").val());
            }
            if( parseInt($("#quantity_val").val()) <= 0 ){
                    $("#quantity_val").val(1);
            }
        });
    });
</script>
@endsection
