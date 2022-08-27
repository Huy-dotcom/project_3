@extends('admin.layouts.index')


@section('content')
<h1 class="h3 mb-2 text-gray-800">Đơn hàng</h1>

@if(Session::has('invalid'))
    <div class="alert alert-danger alert-dismissible">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('invalid')}}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('success')}}
    </div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Người nhận</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Tổng tiền</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Người nhận</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Tổng tiền</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($orders as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->receiver }}</td>
                            <td>{{ $row->tel }}</td>
                            <td>{{ $row->is_paid == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}</td>
                            <td>{{ number_format($row->total,-3,',',',') }} VND</td>
                            <td>{{ date('d/m/Y H:i:s',strtotime($row->created_at)) }}</td>
                            <td>
                                @if ($row->status === 0)
                                    {{ 'Chờ xác nhận' }}
                                @elseif ($row->status === 1)
                                    {{ 'Xác nhận' }}
                                @elseif ($row->status === 2)
                                    {{ 'Hoàn thành' }}
                                @elseif ($row->status === 3)
                                    {{ 'Hủy' }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('order.show',['id' => $row->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
