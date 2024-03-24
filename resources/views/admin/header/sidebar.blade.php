<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.dashboard')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Tổng Quan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.employee.index') }}">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Quản lý nhân viên</span>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.account.index') }}">
        <i class="fas fa-newspaper menu-icon"></i>
        <span class="menu-title">Quản lý tài khoản</span>
      </a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.board.index') }}">
        <i class="fas fa-table menu-icon"></i>
        <span class="menu-title">Quản lý bàn ăn</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.food.index') }}">
        <i class="fas fa-utensils menu-icon"></i>
        <span class="menu-title">Quản lý thực đơn</span>
      </a>
    </li>
    <!-- <li class="nav-item">
            <a class="nav-link" href="">
            <i class="fa fa-address-card" aria-hidden="true"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Quản lý tác giả</span>
            </a>
          </li> -->

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.bill.index') }}">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Quản lý hóa đơn</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.thongke.index') }}" aria-expanded="false" aria-controls="tables">
        <i class="fas fa-newspaper menu-icon"></i>
        <span class="menu-title">Thống kê</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('getLogout') }}">
        <i class="fas fa-sign-out-alt menu-icon"></i>
        <span class="menu-title">Đăng xuất</span>
      </a>
    </li>
  </ul>
</nav>