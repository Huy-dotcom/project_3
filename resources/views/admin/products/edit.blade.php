@extends('admin.layouts.index')


@section('content')
<h1 class="h3 mb-2 text-gray-800">Cập nhật sản phẩm</h1>

<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('product.edit',['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="type">Loại sản phẩm: <span class="text-danger">*</span></label>
                <select class="form-control" name="type" id="type">
                    <option value="0" {{ $product->type == 0 ? 'selected' : '' }}>Sản phẩm thường</option>
                    <option value="1" {{ $product->type == 1 ? 'selected' : '' }}>Sản phẩm khuyến mãi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Tên sản phẩm: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="price">Giá tiền: <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="Nhập giá tiền" id="price" name="price" value="{{ $product->price }}" min=1 required>
            </div>
            <div id="product_sale_container">
                @if ($product->type == 1)
                    <div class="form-group" id="price_sale_container">
                        <label for="price_sale">Giá khuyến mãi: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" placeholder="Nhập giá tiền" id="price_sale" name="price_sale" value="{{ $product->sale_price != 0 ? $product->sale_price : '' }}" min=1 required>
                    </div>
                    <div class="form-group" id="start_date_container">
                        <label for="start_date">Thời gian bắt đầu: <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $product->start_date != null ? $product->start_date : '' }}" required>
                    </div>
                    <div class="form-group" id="end_date_container">
                        <label for="end_date">Thời gian kết thúc: <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $product->end_date != null ? $product->end_date : '' }}" required>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="qty">Số lượng: <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="Nhập số lượng" id="qty" name="qty" value="{{ $product->qty }}" min=1 required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả sản phẩm:</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục sản phẩm: <span class="text-danger">*</span></label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id === $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand_id">Hãng sản phẩm: <span class="text-danger">*</span></label>
                <select class="form-control" name="brand_id" id="cbrandid">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id === $product->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="supplier_id">Nhà cung cấp: <span class="text-danger">*</span></label>
                <select class="form-control" name="supplier_id" id="supplier_id">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $supplier->id === $product->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Chọn hình ảnh:</label>
                <div class="custom-file">
                    <input type="file" id="image" name="image" accept=".png,.gif,.jpg,.jpeg" />
                </div>
            </div>
            <div class="image-preview mb-4" id="imagePreview">
                <img src="{{ asset($product->url) }}" alt="Image Preview" class="image-preview__image" style="display:block;" />
                <span class="image-preview__default-text" style="display:none;">Hình ảnh</span>
            </div>
            <br />
            <button type="submit" class="btn btn-primary" onclick="return validate();">Cập nhật</button>
          </form>
    </div>
</div>
@endsection