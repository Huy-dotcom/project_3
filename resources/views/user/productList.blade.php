<style>
    .productlist {
        background-color: aqua;
        height: 900px;
    }

</style>
<div class="row" id="product-container">

    {{-- <div class="productlist">
                <div></div>
            </div> --}}









    <ul class="product-list grid-products equal-container">
        @foreach ($product as $pd)
            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail" style="border:1px solid rgb(194, 194, 194)">
                        <a href="{{ route('product_detail', ['id' => $pd->id]) }}" title="{{ $pd->name }}">
                            <figure><img src="{{ asset($pd->url) }}" alt="{{ $pd->name }}"></figure>
                        </a>
                    </div>
                    <div class="product-info">
                        <a href="#"
                            class="product-name"><span>{{ \Illuminate\Support\Str::limit($pd->name, 25, $end = '...') }}</span></a>
                        <div class="wrap-price"><span class="product-price">
                                @if ($pd->start_date == null)
                                    <?php echo number_format($pd->price, -3, ',', ',') . ' VND'; ?>
                                @else
                                    <?php echo number_format($pd->sale_price, -3, ',', ',') . ' VND'; ?>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </li>
            {{-- <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 product-data">
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
                        <button class="BTN_addtocart">Thêm vào giỏ</button>
                    </div>
                </div>
            </li> --}}
        @endforeach
    </ul>
    {{ $product->links('pagination::bootstrap-4') }}
</div>
{{-- <div class="wrap-pagination-info">
    {{ $product->links('pagination::bootstrap-4') }}
</div> --}}
