@if (Auth::guard('admin')->user()->notifications()->count() > 0)
@if (Auth::guard('admin')->user()->unreadNotifications->count() > 0)
    <div class="dropdown-item mark-all-as-read-{{ Auth::guard('admin')->user()->id }}">
        <a href="javascript:void(0)" onclick="markAllAsRead()">Đọc tất cả</a>
    </div>
@endif
@foreach (Auth::guard('admin')->user()->notifications()
->orderBy('read_at', 'asc')
->orderBy('created_at', 'desc')->limit(3)->get() as $notification)
    <div class="dropdown-item d-flex align-items-center">
        <div class="mr-3">
            <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
            </div>
        </div>
        <div>
            <div class="small text-gray-500">
                {{ $notification->data['date'] }}
                @if (is_null($notification->read_at))
                    <a class="ml-3 mark-as-read-{{ Auth::guard('admin')->user()->id }}" href="javascript:void(0)" id="mark-as-read-{{ $notification->id }}" onclick="markAsRead('{{$notification->id}}')">Đã đọc</a>
                    <span class="text-danger ml-3 new-{{ Auth::guard('admin')->user()->id }}" id="new-{{ $notification->id }}">New</span>
                @endif
            </div>
            Bạn vừa nhận được đơn hàng mới, mã đơn hàng là: #{{ $notification->data['order_id'] }}, xin vui lòng kiểm tra
        </div>
    </div>
@endforeach
<a class="dropdown-item text-center small text-gray-500" href="{{ route('notification.list') }}">Xem chi tiết</a>
@else
<a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">Hiện chưa có thông báo nào</a>
@endif