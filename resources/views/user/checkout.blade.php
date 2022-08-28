@extends('user.layouts.app')

@section('content')
<style>
    .btn-submit{
        width:200px;
        height:50px;
        display:flex;
        padding:12px;
        background-color: #ff2832;
        color: white;
        border: none;
        font-size:17px;
        font-weight:700;
        align-content: center;
        justify-content:center;
    }
    .btn-submit:hover{
        box-shadow:none;
        background-color:white;
        border: 1px solid #ff2832;
        color: #ff2832;
    }
</style>
    <body class=" checkout page ">

        <!-- mobile menu -->
        <div class="mercado-clone-wrap">
            <div class="mercado-panels-actions-wrap">
                <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
            </div>
            <div class="mercado-panels"></div>
        </div>

        <!--main area-->
        <main id="main" class="main-site">

            <div class="container">

                <div class="wrap-breadcrumb">
                    <ul>
                        <li class="item-link"><a href="#" class="link">home</a></li>
                        <li class="item-link"><span>login</span></li>
                        <li class="item-link"><span>{{ Session::get('notice') }}</span></li>
                    </ul>
                </div>
                <div class=" main-content-area">
                    <form action="{{ route('checkout_process') }}" method="get">


                    <div class="wrap-address-billing">
                        <h3 class="box-title">Thông tin đơn hàng</h3>
                        {{-- <form action="#" method="get" name="frm-billing"> --}}
                            <p class="row-in-form">
                                <label for="fname">Địa chỉ người nhận:</label>
                                <span><input style="width: 200px; height: 50px;" type="text" name="address"  placeholder="Số nhà - đường - huyện/quận - tỉnh/thành phố..." required></span>
                            </p>
                            {{-- <p class="row-in-form">
							<label for="lname">last name<span>*</span></label>
							<input id="lname" type="text" name="lname" value="" placeholder="Your last name">
						</p> --}}
                            {{-- <p class="row-in-form">
                                <label for="email">Email:</label>
                                <span> {{$user_info->email}}</span>
                            </p> --}}
                            <p class="row-in-form">
                                <label for="phone">Số điện thoại:</label>
                                <span><input style="width: 200px; height: 30px;" type="text" name="phone" value="{{$user_info->phone}}" required></span>
                            </p>
                            <p class="row-in-form">
                                <label for="add">Tên người nhận: </label>
                                <span><input style="width: 200px; height: 30px;" type="text" name="receiver" required
                                    value="{{$user_info->name}}"></span>
                            </p>

                            <div class="wrap-iten-in-cart">
                                Thông tin sản phẩm:
                                @php
                                    $total = 0;
                                @endphp
                                <ul class="products-cart">
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


                                                    <span>Số lượng: &nbsp; {{ $cart_item['p_qty'] }}</span>
                                                </p>
                                            </div>
                                            {{-- <div class="quantity"> --}}
                                            {{-- <div class="quantity-input">
                                                <input type="text" name="product-quatity"
                                                    value="{{ $cart_item['p_qty'] }}" data-max="10" pattern="[0-9]*">
                                                <a class="btn btn-increase" href="#"></a>
                                                <a class="btn btn-reduce" href="#"></a>
                                            </div> --}}
                                            {{-- </div> --}}
                                            <div class="price-field sub-total">
                                                <p class="price"> <?php echo number_format($cart_item['p_price'] * $cart_item['p_qty'], -3, ',', ',') . ' VND'; ?></p>
                                            </div>
                                            {{-- <div class="price-field produtc-price">
                                        <a href="" class="btn-update">cập nhật</a>
                                    </div> --}}
                                        </li>
                                        @php
                                            $total += $cart_item['p_price'] * $cart_item['p_qty'];
                                        @endphp
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <p class="row-in-form">
							<label for="country">Country<span>*</span></label>
							<input id="country" type="text" name="country" value="" placeholder="United States">
						</p>
						<p class="row-in-form">
							<label for="zip-code">Postcode / ZIP:</label>
							<input id="zip-code" type="number" name="zip-code" value="" placeholder="Your postal code">
						</p>
						<p class="row-in-form">
							<label for="city">Town / City<span>*</span></label>
							<input id="city" type="text" name="city" value="" placeholder="City name">
						</p> --}}
                            {{-- <p class="row-in-form fill-wife">
							<label class="checkbox-field">
								<input name="create-account" id="create-account" value="forever" type="checkbox">
								<span>Create an account?</span>
							</label>
							<label class="checkbox-field">
								<input name="different-add" id="different-add" value="forever" type="checkbox">
								<span>Ship to a different address?</span>
							</label>
						</p> --}}

                        {{-- </form> --}}
                    </div>
                    <div class="summary summary-checkout">

                            <div class="summary-item payment-method">
                                <h4 class="title-box">Phương thức thanh toán:</h4>
                                <div class="choose-payment-methods">
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-bank" value="1" type="radio" checked>
                                        <span>Tiền mặt</span>
                                        <span class="payment-desc">Thanh toán sau khi nhận hàng</span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-bank" value="2" type="radio">
                                        <span>Chuyển Khoản ngân hàng</span>
                                        <span class="payment-desc">tiện lợi, nhanh chóng</span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-visa" value="3" type="radio">
                                        <span>visa</span>
                                        <span class="payment-desc">dành cho khách hàng ngoài nước</span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-paypal" value="4" type="radio">
                                        <span>Paypal</span>
                                        <span class="payment-desc">Thông dụng trên toàn cầu</span>
                                    </label>
                                </div>
                                {{-- <form action="{{ route('checkout_process') }}" method="get"> --}}
                                    <input type="hidden" name="total" value="{{$total}}">
                                <p class="summary-info grand-total"><span>Tổng cộng:</span> <span
                                        class="grand-total-price"><?php echo number_format($total, -3, ',', ',') . ' VND'; ?></span></p>
                                <button type="submit" class="btn-submit" >xác nhận</button>
                                {{-- </form> --}}
                            </div>
                            <div class="summary-item shipping-method">
                                <h4 class="title-box f-title">Phí giao hàng</h4>
                                <p class="summary-info"><span class="title">miễn phí</span></p>
                                {{-- <h4 class="title-box">Discount Codes</h4> --}}
                                {{-- <p class="row-in-form">
                                <label for="coupon-code">Enter Your Coupon code:</label>
                                <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">
                            </p> --}}
                                {{-- <a href="#" class="btn btn-small">Apply</a> --}}
                            </div>

                    </div>
                    </form>
                </div>
                <!--end main content area-->
            </div>
            <!--end container-->

        </main>
        <!--main area-->
    @endsection
