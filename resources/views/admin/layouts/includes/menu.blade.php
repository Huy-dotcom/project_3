<!-- Nav Item - Dashboard -->
<li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Thống kê</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Hàng hóa
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ Route::is('category.list') || Route::is('category.add.form') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
        aria-controls="collapseOne">
        <i class="fas fa-fw fa-table"></i>
        <span>Danh mục sản phẩm</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('category.list') }}">Danh sách</a>
            <a class="collapse-item" href="{{ route('category.add') }}">Thêm mới</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item {{ Route::is('brand.list') || Route::is('brand.add.form') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true"
        aria-controls="collapseEight">
        <i class="fas fa-fw fa-table"></i>
        <span>Hãng</span>
    </a>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('brand.list') }}">Danh sách</a>
            <a class="collapse-item" href="{{ route('brand.add') }}">Thêm mới</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item {{ Route::is('supplier.list') || Route::is('supplier.add.form') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-table"></i>
        <span>Nhà cung cấp</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('supplier.list') }}">Danh sách</a>
            <a class="collapse-item" href="{{ route('supplier.add') }}">Thêm mới</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item {{ Route::is('product.list') || Route::is('product.add.form') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
        aria-controls="collapseThree">
        <i class="fas fa-fw fa-table"></i>
        <span>Sản phẩm</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('product.list') }}">Danh sách</a>
            <a class="collapse-item" href="{{ route('product.add') }}">Thêm mới</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Người dùng
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item {{ Route::is('customer.list') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
        aria-controls="collapseFive">
        <i class="fas fa-fw fa-table"></i>
        <span>Tài khoản</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('customer.list') }}">Danh sách</a>
        </div>
    </div>
</li>

@if (Auth::guard('admin')->user()->role == 0)
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Route::is('staff.list') || Route::is('staff.add.form') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true"
            aria-controls="collapseNine">
            <i class="fas fa-fw fa-table"></i>
            <span>Nhân viên</span>
        </a>
        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('staff.list') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('staff.add') }}">Thêm mới</a>
            </div>
        </div>
    </li>
@endif


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Mua hàng
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item {{ Route::is('order.list') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true"
        aria-controls="collapseSeven">
        <i class="fas fa-fw fa-table"></i>
        <span>Đơn hàng</span>
    </a>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('order.list') }}">Danh sách</a>
        </div>
    </div>
</li>
