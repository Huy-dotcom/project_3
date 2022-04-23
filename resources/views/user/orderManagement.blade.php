@extends('user.layouts.app')
@section('content')

    <body>
        <style>
            .order-list {
                min-height: 300px;
                display: flex;
                justify-content: center;
                padding: 20px;
                font-family: Montserrat;
                background: rgb(247, 247, 247);

            }

            .tabs {
                max-width: 95%;
                display: flex;
                flex-direction: column;
                width: 95%;
                background: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0, 0.5);
                border: 1px solid #666;
            }

            .tab-head {
                display: flex;
                align-items: stretch;
            }

            .tab_toggle {
                display: flex;
                width: 20%;
                height: 40px;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                background-color: #8E806A;
                color: white;
                border-bottom: 1px solid #666;
                border-right: 1px solid #666;
                font-weight: 600;
                font-size: 16px;
                border-collapse: collapse;
            }

            .tab_toggle.is_active {
                background-color: #fff;
                color: #8E806A;
                border-bottom:none;
            }

            .tab_content {
                padding: 30px;
                display: none;
            }

            .tab_content.is_active {
                display: block;
            }

        </style>
        <style>
            table {
                width: 100%;
                font-size: 14px;
            }

            th {
                background-color: #11468F;
                color: white;
                height: 40px;
                border: 1px solid white;
            }

            th,
            td {
                border-bottom: 1px solid #e2e2e2;
                padding: 8px;
            }

            td {
                height: 80px;
                font-size: 15px;
            }
            .btn_view{
                display:block;
                width:60px;
                height:30px;
                background: rgb(24, 167, 167);
                font-weight:600;
                color: white;
                padding: 4px 16px;
            }
            .btn_view:hover{
                background: white;
                border: 1px solid rgb(24, 167, 167);
                color: rgb(24, 167, 167);
            }
            .btn_cancel{
                display:block;
                width:110px;
                height:40px;
                background: red;
                font-weight:600;
                color: white;
                padding: 9px 9px;
            }
            .btn_cancel:hover{
                background: white;
                color: red;
                border: 1px solid red;
            }
        </style>
        <div class="order-list">
            <div class="tabs">
                <div class="tab-head">
                    <span class="tab_toggle is_active">Tất cả đơn hàng</span>
                    <span class="tab_toggle ">Đang đợi xác nhận</span>
                    <span class="tab_toggle ">Đang giao</span>
                    <span class="tab_toggle ">Đã hoàn thành</span>
                    <span class="tab_toggle ">Lịch sử</span>
                </div>
                <div class="tab_body">
                    <div class="tab_content is_active">
                        <table>
                            <tr>
                                <th width="5%">STT</th>
                                <th width="45%">Địa Chỉ Giao Hàng</th>
                                <th width="20%">Tổng Tiền</th>
                                <th width="10%">Trạng Thái</th>
                                <th width="10%">Chi Tiết</th>
                                <th width="10%">Hành Động</th>
                            </tr>
                            @foreach ($allOrder as $item)
                                <tr>
                                    <td>{{ $loop->index }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td><?php echo number_format($item->total, -3, ',', ',') . ' VND'; ?></td>
                                    <td>
                                        @switch($item->status)
                                            @case(0)
                                                <span style="color:rgb(14, 185, 14)">Đợi xác nhận </span>
                                            @break

                                            @case(1)
                                                <span style="color:orange">Đang giao </span>
                                            @break

                                            @case(2)
                                                <span style="color:rgb(45, 45, 145)">Đã giao</span>
                                            @break

                                            @case(3)
                                                <span style="color:red"> Đã hủy</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a class="btn_view" href="{{ route('order_detail', ['id'=>$item->id]) }}">xem</a>
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            <a class="btn_cancel" href="{{ route('cancel_order', ['id'=>$item->id]) }}" onclick="return confirm('Bạn chắc chắn muốn hủy?')">hủy đơn hàng</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                    <div class="tab_content ">
                        <table>
                            <tr>
                                <th width="5%">STT</th>
                                <th width="45%">Địa Chỉ Giao Hàng</th>
                                <th width="20%">Tổng Tiền</th>
                                <th width="10%">Trạng Thái</th>
                                <th width="10%">Chi Tiết</th>
                                <th width="10%">Hành Động</th>
                            </tr>
                            @foreach ($orderOnChecking as $item)
                                <tr>
                                    <td>{{ $loop->index }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td><?php echo number_format($item->total, -3, ',', ',') . ' VND'; ?></td>
                                    <td>
                                        @switch($item->status)
                                            @case(0)
                                                <span style="color:rgb(14, 185, 14)">Đợi xác nhận </span>
                                            @break

                                            @case(1)
                                                <span style="color:orange">Đang giao </span>
                                            @break

                                            @case(2)
                                                <span style="color:rgb(45, 45, 145)">Đã giao</span>
                                            @break

                                            @case(3)
                                                <span style="color:red"> Đã hủy</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a class="btn_view" href="{{ route('order_detail', ['id'=>$item->id]) }}">xem</a>
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            <a class="btn_cancel" href="{{ route('cancel_order', ['id'=>$item->id]) }}" onclick="return confirm('Bạn chắc chắn muốn hủy?')">hủy đơn hàng</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab_content ">
                        <table>
                            <tr>
                                <th width="5%">STT</th>
                                <th width="45%">Địa Chỉ Giao Hàng</th>
                                <th width="20%">Tổng Tiền</th>
                                <th width="10%">Trạng Thái</th>
                                <th width="10%">Chi Tiết</th>
                                <th width="10%">Hành Động</th>
                            </tr>
                            @foreach ($orderOnShipping as $item)
                                <tr>
                                    <td>{{ $loop->index }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td><?php echo number_format($item->total, -3, ',', ',') . ' VND'; ?></td>
                                    <td>
                                        @switch($item->status)
                                            @case(0)
                                                <span style="color:rgb(14, 185, 14)">Đợi xác nhận </span>
                                            @break

                                            @case(1)
                                                <span style="color:orange">Đang giao </span>
                                            @break

                                            @case(2)
                                                <span style="color:rgb(45, 45, 145)">Đã giao</span>
                                            @break

                                            @case(3)
                                                <span style="color:red"> Đã hủy</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a class="btn_view" href="{{ route('order_detail', ['id'=>$item->id]) }}">xem</a>
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            <a class="btn_cancel" href="{{ route('cancel_order', ['id'=>$item->id]) }}" onclick="return confirm('Bạn chắc chắn muốn hủy?')">hủy đơn hàng</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab_content ">
                        <table>
                            <tr>
                                <th width="5%">STT</th>
                                <th width="45%">Địa Chỉ Giao Hàng</th>
                                <th width="20%">Tổng Tiền</th>
                                <th width="10%">Trạng Thái</th>
                                <th width="10%">Chi Tiết</th>
                                <th width="10%">Hành Động</th>
                            </tr>
                            @foreach ($orderFinished as $item)
                                <tr>
                                    <td>{{ $loop->index }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td><?php echo number_format($item->total, -3, ',', ',') . ' VND'; ?></td>
                                    <td>
                                        @switch($item->status)
                                            @case(0)
                                                <span style="color:rgb(14, 185, 14)">Đợi xác nhận </span>
                                            @break

                                            @case(1)
                                                <span style="color:orange">Đang giao </span>
                                            @break

                                            @case(2)
                                                <span style="color:rgb(45, 45, 145)">Đã giao</span>
                                            @break

                                            @case(3)
                                                <span style="color:red"> Đã hủy</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a class="btn_view" href="{{ route('order_detail', ['id'=>$item->id]) }}">xem</a>
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            <a class="btn_cancel" href="{{ route('cancel_order', ['id'=>$item->id]) }}" onclick="return confirm('Bạn chắc chắn muốn hủy?')">hủy đơn hàng</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab_content ">
                        <table>
                            <tr>
                                <th width="5%">STT</th>
                                <th width="45%">Địa Chỉ Giao Hàng</th>
                                <th width="20%">Tổng Tiền</th>
                                <th width="10%">Trạng Thái</th>
                                <th width="10%">Chi Tiết</th>
                                <th width="10%">Hành Động</th>
                            </tr>
                            @foreach ($history as $item)
                                <tr>
                                    <td>{{ $loop->index }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td><?php echo number_format($item->total, -3, ',', ',') . ' VND'; ?></td>
                                    <td>
                                        @switch($item->status)
                                            @case(0)
                                                <span style="color:rgb(14, 185, 14)">Đợi xác nhận </span>
                                            @break

                                            @case(1)
                                                <span style="color:orange">Đang giao </span>
                                            @break

                                            @case(2)
                                                <span style="color:rgb(45, 45, 145)">Đã giao</span>
                                            @break

                                            @case(3)
                                                <span style="color:red"> Đã hủy</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a class="btn_view" href="{{ route('order_detail', ['id'=>$item->id]) }}">xem</a>
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            <a class="btn_cancel" href="{{ route('cancel_order', ['id'=>$item->id]) }}" onclick="return confirm('Bạn chắc chắn muốn hủy?')">hủy đơn hàng</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let tabs = document.querySelectorAll('.tab_toggle'),
                contents = document.querySelectorAll('.tab_content');
            tabs.forEach((tab, index) => {
                tab.addEventListener('click', () => {
                    contents.forEach((content) => {
                        content.classList.remove('is_active');
                    });
                    tabs.forEach((tab) => {
                        tab.classList.remove('is_active');
                    });

                    contents[index].classList.add('is_active');
                    tabs[index].classList.add('is_active');
                });
            });
        </script>
    @endsection
