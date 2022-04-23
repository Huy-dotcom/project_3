<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<style>
    .productlist {
        background-color: aqua;
        height: 900px;
    }

    .product-data {
        display: flex;
        width: 300px;
        height: 378px;
        margin-top: 10px;
        margin-bottom: 30px;
    }

    .product-data figure {}

    .wrap-price {
        display: block;
        height: 40px;
    }

</style>

<div class="row">

    <ul class="product-list grid-products equal-container">
        @foreach ($product as $pd)
            {{-- <form action="" method="get"> --}}
            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 product-data">
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail" style="display:inline-block;"
                        style="display: inline-block; width: 210px; height: 210px;">
                        <a href="{{ route('product_detail', ['id' => $pd->id]) }}" title="{{ $pd->name }}">
                            <figure><img src="{{ asset($pd->url) }}"></figure>
                        </a>
                    </div>
                    <div class="product-info">
                        <input type="hidden" name="id" class="p_id" value="{{ $pd->id }}">
                        <input type="hidden" name="name" class="p_name" value="{{ $pd->name }}">
                        <input type="hidden" name="product-quatity" class="p_qty" value="1">
                        <input type="hidden" name="url" class="p_img" value="{{ $pd->url }}">
                        <a href="{{ route('product_detail', ['id' => $pd->id]) }}" class="product-name"
                            style="display: block; height: 36px;"><span>{{ \Illuminate\Support\Str::limit($pd->name, 25, $end = '...') }}</span></a>
                        <div class="wrap-price">
                            @if ($pd->start_date == null)
                                <span class="product-price">Giá:&nbsp;<?php echo number_format($pd->price, -3, ',', ',') . ' VND'; ?></span>
                                <input type="hidden" name="price" class="p_price" value="{{ $pd->price }}">
                            @else
                            <span class="product-price">Giá:&nbsp;</span><span class="product-price" style="text-decoration: line-through">
                                   <?php echo number_format($pd->price, -3, ',', ',') . ' VND'; ?></span><br>
                                <span class="product-price">chỉ còn: &nbsp; <?php echo number_format($pd->sale_price, -3, ',', ',') . ' VND'; ?></span>
                                <input type="hidden" name="price" class="p_price"
                                    value="{{ $pd->sale_price }}">
                            @endif
                        </div>
                        <a class="btn add-to-cart BTN_addtocart">Thêm vào giỏ</a>
                    </div>
                </div>
            </li>
            {{-- </form> --}}
        @endforeach
    </ul>
</div>
<div class="wrap-pagination-info">
    {{ $product->links('pagination::bootstrap-4') }}
</div>
<script>
    $(document).ready(function() {
        $('.BTN_addtocart').click(function(e) {
            console.log('test');
            e.preventDefault();
            var p_id = $(this).closest('.product').find('.p_id').val();
            var p_name = $(this).closest('.product').find('.p_name').val();
            var p_qty = $(this).closest('.product').find('.p_qty').val();
            var p_img = $(this).closest('.product').find('.p_img').val();
            var p_price = $(this).closest('.product').find('.p_price').val();
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
                    alert(response);
                }
            });

        });
    });
</script>
