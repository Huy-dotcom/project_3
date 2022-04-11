<div class="row" id="product-container">
    <ul class="product-list grid-products equal-container">
        @foreach ($product as $pd)
            {{-- <form action="{{ route('add_to_cart') }}" method="get"> --}}

            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 product-data">
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail" style="display:inline-block;" style="display: inline-block; width: 210px; height: 210px;">
                        <a href="{{ route('product_detail', ['id' => $pd->id]) }}" title="{{ $pd->name }}">
                            <figure style:="display:block; width:100%; height:100%"><img src="{{ asset($pd->url) }}"></figure>
                        </a>
                    </div>
                    <div class="product-info">
                        <input type="hidden" name="id" class="p_id" value="{{ $pd->id }}">
                        <input type="hidden" name="name" class="p_name" value="{{ $pd->name }}">
                        <input type="hidden" name="product-quatity" class="p_qty" value="1">
                        <input type="hidden" name="url" class="p_img" value="{{ $pd->url }}">
                        <a href="{{ route('product_detail', ['id' => $pd->id]) }}" class="product-name"
                            style="display: block; height: 36px;"><span>{{ \Illuminate\Support\Str::limit($pd->name, 25, $end = '...') }}</span></a>
                        @if ($pd->start_date == null)
                            <div class="wrap-price">
                                <span class="product-price">Giá:&nbsp;<?php echo number_format($pd->price, -3, ',', ',') . ' VND'; ?>&#8363;</span>
                                <input type="hidden" name="price" class="p_price" value="{{ $pd->price }}">
                            </div>
                        @else
                            <div class="warp-price">
                                <span class="product-price" style="text-decoration: line-through">Giá:
                                    &nbsp;<?php echo number_format($pd->price, -3, ',', ',') . ' VND'; ?></span><br>
                                <span class="product-price">chỉ còn: &nbsp; <?php echo number_format($pd->sale_price, -3, ',', ',') . ' VND'; ?></span>
                                <input type="hidden" name="price" class="p_price"
                                    value="{{ $pd->sale_price }}">
                            </div>
                        @endif

                        {{-- <a type="submit" onclick="this.closest('form').submit();return false;" class="btn add-to-cart">Thêm vào Giỏ</a> --}}
                        {{-- <a class="BTN_addtocart" class="btn add-to-cart">Thêm vào Giỏ</a> --}}
                        <button class="BTN_addtocart">Thêm vào giỏ</button>
                    </div>
                </div>
            </li>
            {{-- </form> --}}
        @endforeach

    </ul>
    {{ $product->links('pagination::bootstrap-4') }}
    <br>

</div>
