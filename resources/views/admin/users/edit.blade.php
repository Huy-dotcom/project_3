@extends('admin.layouts.index')


@section('content')
<h1 class="h3 mb-2 text-gray-800">Cập nhật tài khoản</h1>

<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('customer.edit',['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="name">Họ tên: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập họ tên" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email: <span class="text-danger">*</span></label>
                <input type="email" class="form-control" placeholder="Nhập email" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập số điện thoại" id="phone" name="phone" value="{{ $user->phone }}" required>
            </div>
            <div class="form-group">
                <label for="sex">Giới tính: <span class="text-danger">*</span></label>
                <select name="sex" class="form-control" required>
                    <option value="0" {{ $user->sex == 0 ? 'selected' : '' }}>Nam</option>
                    <option value="1" {{ $user->sex == 1 ? 'selected' : '' }}>Nữ</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
          </form>
    </div>
</div>
@endsection