@extends('admin.layouts.index')


@section('content')
<h1 class="h3 mb-2 text-gray-800">Thông báo đơn hàng</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        @if ($notifications->count() > 0)
            <a href="javascript:void(0)" onclick="markAllAsRead()" class="btn btn-primary">Đọc tất cả</a>
        @endif
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="300">Thông báo</th>
                        <th>Thời gian nhận</th>
                        <th>Thời gian đọc</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Thông báo</th>
                        <th>Thời gian nhận</th>
                        <th>Thời gian đọc</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($notifications as $notification)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>Bạn vừa nhận được đơn hàng mới, mã đơn hàng là: #{{ $notification->data['order_id'] }}, xin vui lòng kiểm tra @if(is_null($notification->read_at)) <span class="text-danger ml-3 new" id="new-item-{{ $notification->id }}">New</span></td>@endif
                            <td>{{ $notification->data['date'] }}</td>
                            <td id="date-read-{{ $notification->id }}">{{ !is_null($notification->read_at) ? date('d/m/Y H:i:s', strtotime($notification->read_at)) : 'N/A' }}</td>
                            <td>
                                @if (is_null($notification->read_at))
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm mark-as-read" id="notification-mark-as-read-{{ $notification->id }}" onclick="markAsRead('{{$notification->id}}')">
                                        Đã đọc
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection