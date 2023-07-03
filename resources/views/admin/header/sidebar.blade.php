<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Tổng Quan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.genres.index') }}">
              <i class="fas fa-newspaper menu-icon"></i>
              <span class="menu-title">Quản lý thể loại</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.comics.index') }}">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Quản lý truyện</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.chapters.index') }}">
              <i class="fas fa-book-open menu-icon"></i>
              <span class="menu-title">Quản lý chapter</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="">
            <i class="fa fa-address-card" aria-hidden="true"></i>&nbsp &nbsp &nbsp
              <span class="menu-title">Quản lý tác giả</span>
            </a>
          </li> -->
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.account.index') }}">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Quản lý tài khoản</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.comment.index') }}" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-comments menu-icon"></i>
              <span class="menu-title">Quản lý bình luận</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-sign-out-alt menu-icon"></i>
              <span class="menu-title">Đăng xuất</span>
            </a>
          </li>
        </ul>
      </nav>
      