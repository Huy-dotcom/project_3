@extends('admin.layouts.index')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thống kê</h1>

    <form action="{{ route('filter.order') }}" method="GET" enctype="multipart/form-data">

        <div class="col-md-12">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="start_date">Ngày bắt đầu: <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="col-md-4">
                        <label for="end_date">Ngày kết thúc: <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="end_date" name="end_date"required>
                    </div>
                    <div class="col-md-4">
                        <label for="status">Trạng thái:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="-1">Tất cả</option>
                            <option value="0">Chờ xác nhận</option>
                            <option value="1">Xác nhận</option>
                            <option value="2">Hoàn thành</option>
                            <option value="3">Hủy</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Lọc</button>
        </div>
    </form>
@endsection