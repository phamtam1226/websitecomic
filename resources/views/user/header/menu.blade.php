<label class="top-log mx-auto"></label>
<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">
  <!-- Nút show menu mobile -->
  <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">

    </span>
  </button>
  <!-- Menu trang web -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-bottom: -10px">
    <ul class="navbar-nav nav-mega mx-auto">
      <!-- Trang chủ -->
      <li class="nav-item active">
        <a class="nav-link ml-lg-0" href="{{ url('/') }}">Trang Chủ

        </a>
      </li>
      <!-- Thể loại -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Thể Loại
        </a>
        <ul class="dropdown-menu mega-menu">
          <li>
            <div class="row">

              <div class="col-md-4 media-list span4 text-left">

                <a href="{{ url('/timtruyen') }}">Action</a>
              </div>
              <div class="col-md-4 media-list span4 text-left">
                <a href="{{ url('/timtruyen') }}">Anime</a>
              </div>
            </div>
            <hr>
            <a href="" style="text-align:center;color:black">
              <h5 class="tittle-w3layouts-sub"> Xem Tất Cả </h5>
            </a>
          </li>
        </ul>
      </li>
      <!-- Xếp hạng -->
      <li class="nav-item dropdown">
        <a rel="nofollow" href="#" class="nav-link " data-toggle="dropdown" role="button" aria-expanded="false">Xếp hạng <i class="fa fa-sort"></i></a>
        <ul class="dropdown-menu mega-menu">
          <li>
            <div class="row">
              <div class="col-md-4 media-list span4 text-left">
                <a rel="nofollow" href="https://baotangtruyengo.com/tim-truyen?status=-1&amp;sort=10"> <i class="fa fa-eye"> </i> Top all</a>
              </div>
              <div class="col-md-4 media-list span4 text-left">
                <a href="https://baotangtruyengo.com/tim-truyen?status=2&amp;sort=0">
                  <strong> <i class="fa fa-signal"> </i> Truyện full</strong>
                </a>
              </div>
              <div class="col-md-4 media-list span4 text-left">
              <a rel="nofollow" href="https://baotangtruyengo.com/tim-truyen?status=-1&amp;sort=20"> <i class="fa fa-thumbs-o-up"> </i> Yêu Thích</a>
              </div>
              <div class="col-md-4 media-list span4 text-left">
              <a rel="nofollow" href="https://baotangtruyengo.com/tim-truyen?status=-1&amp;sort=11"> <i class="fa fa-eye"> </i> Top tháng</a>
              </div>
              <div class="col-md-4 media-list span4 text-left">
              <a rel="nofollow" href="https://baotangtruyengo.com/tim-truyen?status=-1&amp;sort=12"> <i class="fa fa-eye"> </i> Top tuần</a>
              </div>
              <div class="col-md-4 media-list span4 text-left">
              <a rel="nofollow" href="https://baotangtruyengo.com/tim-truyen?status=-1&amp;sort=13"> <i class="fa fa-eye"> </i> Top ngày</a>
              </div>
              <div class="col-md-4 media-list span4 text-left">
              <a href="https://baotangtruyengo.com/tim-truyen"> <i class="fa fa fa-refresh"> </i> Mới cập nhật</a>
              </div>
              <div class="col-md-4 media-list span4 text-left">
              <a rel="nofollow" href="https://baotangtruyengo.com/tim-truyen?status=-1&amp;sort=15"> <i class="fa fa-cloud-upload"> </i> Truyện mới</a>
              </div>
            </div>
           
          </li>
        </ul>
      </li>
      <!-- Tìm truyện -->
      <li class="nav-item">
               
        <a class="nav-link" href="{{ url('/timtruyen') }}">Tìm Truyện</a>
      </li>
      <!-- Lịch sử -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/history') }}">Lịch Sử</a>
      </li>
      <!-- Thanh tìm kiếm -->
      <li style="padding: 5px 0 0 15px;">
        <form id="form-search" action="">
          @csrf
          <input type="text" class="input-search" name="keyword" id="keywords" placeholder="Tìm truyện ...">

          <button style="border-radius: 0.25rem; padding: 0.25rem 0.5rem; background-color: rgb(104, 101, 92); color: cornsilk;" type="button" onclick="saveSearch()">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </li>
    </ul>
    <div id="search_ajax"></div>
  </div>
</nav>
</header>
<style>
  .time-dialog {
    width: 60px;
    height: 30px
  }
</style>