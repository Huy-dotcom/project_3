<div class="row" id="product-container">
    <ul class="product-list grid-products equal-container">
        @foreach ($product as $pd)
            <form action="{{ route('add_to_cart') }}" method="get">
                <input type="hidden" name="id" value="{{ $pd->id }}">
                <input type="hidden" name="name" value="{{ $pd->name }}">
                <input type="hidden" name="product-quatity" value="1">
                <input type="hidden" name="url" value="{{ $pd->url }}">
                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                    <div class="product product-style-3 equal-elem ">
                        <div class="product-thumnail" style="display: inline-block; width: 213px; height: 213px;">
                            <a href="{{ route('product_detail', ['id' => $pd->id]) }}" title="{{ $pd->name }}">
                                <figure><img src="{{ asset($pd->url) }}"></figure>
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="{{ route('product_detail', ['id' => $pd->id]) }}" class="product-name"
                                style="display: block; height: 36px;"><span>{{ \Illuminate\Support\Str::limit($pd->name, 25, $end = '...') }}</span></a>
                            @if ($pd->start_date == null)
                                <div class="wrap-price">
                                    <span class="product-price">Giá:&nbsp;<?php echo number_format($pd->price, -3, ',', ',') . ' VND'; ?>&#8363;</span>
                                    <input type="hidden" name="price" value="{{ $pd->price }}">
                                </div>
                            @else
                                <div class="warp-price">
                                    <span class="product-price" style="text-decoration: line-through">Giá: &nbsp;<?php echo number_format($pd->price, -3, ',', ',') . ' VND'; ?></span><br>
                                    <span class="product-price">chỉ còn: &nbsp; <?php echo number_format($pd->sale_price, -3, ',', ',') . ' VND'; ?></span>
                                    <input type="hidden" name="price" value="{{ $pd->sale_price }}">
                                </div>
                            @endif

                            <a type="submit" onclick="this.closest('form').submit();return false;" class="btn add-to-cart">Thêm vào Giỏ</a>
                        </div>
                    </div>
                </li>
            </form>
        @endforeach
    </ul>
    <br>
    {{ $product->links('pagination::bootstrap-4') }}
</div>
