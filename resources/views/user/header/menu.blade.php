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
          <a class="nav-link" href="{{ route('comics_search') }}">Thể Loại</a>
          <ul class="dropdown-menu mega-menu">
              <li>
                  <div class="row" style="text-align: center;">
                      <div class="col-md-3 media-list span3 text-left">
                          <a href="{{ route('comics_search') }}">Tất cả</a>
                      </div>
                      @foreach ($genres as $genre)
                      <div class="col-md-3 media-list span3 text-left">
                          <a href="{{ route('comics_search.genre', ['genre' => $genre->id]) }}">{{ $genre->name }}</a>
                      </div>
                      @endforeach
                  </div>
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
          <a class="nav-link" href="{{ route('advanced_comics_search') }}">Tìm Truyện</a>
      </li>
      <!-- Lịch sử -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/history') }}">Lịch Sử</a>
      </li>
      <!-- Thanh tìm kiếm -->
      <li style="padding: 5px 0 0 15px;">
          <form id="form-search" action="{{ route('comics_search_keyword') }}" method="GET">
              <div class="search-container">
                  <input type="text" class="input-search" name="keyword" id="keywords" autocomplete="off" placeholder="Tìm truyện ..." value="{{ request()->input('keyword') }}">
                  <button style="border-radius: 0.25rem; padding: 0.25rem 0.5rem; background-color: rgb(104, 101, 92); color: cornsilk;" type="submit">
                      <i class="fa fa-search"></i>
                  </button>
                  <div class="search-results">
                      <ul class="list-unstyled" id="search-results">
                      </ul>
                  </div>
              </div>
          </form>
      </li>
    <div id="search_ajax"></div>
  </div>
</nav>
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#keywords').on('keyup', function() {
        var keyword = $(this).val();
        if (keyword.length >= 1) {
          $.ajax({
            url: '{{ route("comics_search_keyword") }}',
            type: 'GET',
            data: { keyword: keyword },
            success: function(data) {
              var html = '';
              if (data.length > 0) {
                data.forEach(function(comic) {                  
                  html += '<li class="suggested-comics">';
                  html += '<a href="/details/' + comic.id + '">';
                  html += '<div class="suggested-row">';
                  html += '<div class="col-md-3">';
                  html += '<img src="' + comic.cover_image + '" alt="' + comic.comic_name + '" style="width: 100%;height: 80px;"/>';
                  html += '</div>';
                  html += '<div class="col-md-9">';
                  html += '<h3>' + comic.comic_name + '</h3>';
                  html += '<p>' + comic.latest_chapter + '</p>';
                  html += '<p>' + comic.genre_names.join(', ') + '</p>';
                  html += '</div>';
                  html += '</div>';
                  html += '</a>';
                  html += '</li>';
                });
              }
              $('#search-results').html(html);
              $('#search-results').show();
            }
          });

        } else {
            $('#search-results').hide();
        }
    });

    // Ẩn dropdown khi người dùng nhấp vào nơi khác trên trang
    $(document).on('click', function(event) {
        if (!$(event.target).closest('#form-search').length) {
            $('#search-results').hide();
        }
    });
});
</script>
