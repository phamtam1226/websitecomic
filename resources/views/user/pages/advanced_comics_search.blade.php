@extends('user.layout')

@section('content')

<div class="container">

  <div class="row">

    <div class="col-md-12">
      <div class="comic-filter mrb10">
        <h1 class="text-center">Tìm truyện nâng cao</h1>
      </div>
      <div class="text-center mrb5">
        <button type="button" class="btn btn-info btn-collapse">
          <span class="show-text hidden">Hiện khung tìm kiếm <i class="fa fa-angle-double-down"></i></span>
          <span class="hide-text" style="display: none;">Ẩn khung tìm kiếm <i class="fa fa-angle-double-up"></i></span>
        </button>
      </div>
    </div>

    <div class="advsearch-form">
      <form class="form-horizontal" action="{{ route('advanced_comics_search') }}" method="GET">
        <div class="form-group">
          <p class="mrb5">
            <label>
              <input type="checkbox" checked disabled>
            </label>
            <span class="icon-tick"></span> Tìm trong những thể loại này
          </p>
          <p class="mrb5">
            <label>
              <input type="checkbox" disabled>
            </label>
            <span class="icon-checkbox"></span> Truyện có thể thuộc hoặc không thuộc thể loại này
            <button type="button" class="btn btn-primary btn-sm pull-right btn-reset" onclick="resetFilters()">
              <i class="fa fa-refresh"></i> Reset
            </button>
          </p>
        </div>
        <div class="row form-group clearfix">
          <label class="col-sm-2 control-label mrt5 mrt5">Thể loại</label>

          <div class="col-sm-10">
            <div class="row">
              @foreach ($genres as $genre)
                <div class="col-md-3 col-sm-4 col-xs-6 mrb10">
                  <div class="genre-item">
                  <label>
                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                    @if(is_array(session('genres')) && in_array($genre->id, session('genres'))) checked @endif>
                    {{ $genre->name }}
                  </label>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

        </div>
        <div class="row form-group clearfix">

          <div class="col-sm-2 control-label mrt5">
            <label for="status">Số lượng chapter</label>
          </div>

          <div class="col-sm-4">
            <select class="form-control" id="chapter" name="chapter">
              <option value="">Tất cả</option>
              <option value="1">>= 1 chapter</option>
              <option value="3">>= 3 chapter</option>
              <option value="50">>= 50 chapter</option>
              <option value="100">>= 100 chapter</option>
              <option value="200">>= 200 chapter</option>
              <option value="300">>= 300 chapter</option>
              <option value="400">>= 400 chapter</option>
              <option value="500">>= 500 chapter</option>
            </select>
          </div>

          <div class="col-sm-2 control-label mrt5">
            <label for="status">Tình trạng</label>
          </div>

          <div class="col-sm-4">
            <select id="status" class="form-control select-status" name="status">
              <option selected="selected" value="">Tất cả</option>
              <option value="0">Đang tiến hành</option>
              <option value="1">Đã hoàn thành</option>
            </select>
          </div>
        </div>

        <div class="row form-group">

          <div class="col-sm-2 control-label mrt5">
            <label for="gender">Dành cho</label>
          </div>

          <div class="col-sm-4">
            <select class="form-control" id="gender" name="gender">
              <option value="">Tất cả</option>
              <option value="male">Nam</option>
              <option value="female">Nữ</option>
            </select>
          </div>

          <div class="col-sm-2 control-label mrt5">
            <label for="sort">Sắp xếp theo</label>
          </div>

          <div class="col-sm-4">
            <select class="form-control" id="sort" name="sort">
              <option value="newest">Truyện mới</option>
              <option value="most_comment">Bình luận nhiều nhất</option>
              <option value="most_view">Xem nhiều nhất</option>
              <option value="most_follow">Theo dõi nhiều nhất</option>
              <option value="most_chapter">Số chapter nhiều nhất</option>
            </select>
          </div>

        </div>

        <div class="form-group">

          <div class="col-sm-4 col-sm-offset-2">
            <button type="submit" class="btn btn-success btn-search">Tìm kiếm</button>
          </div>

        </div>
      </form>
      </div>
      <br>
    <div class="row">
        <!-- truyện -->
        <div class="col-md-12 col-sm-6">
            <div class="row">
                @foreach($comics as $comic)
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">
                        <div class="image">
                            <a href="{{ route('details', ['comicId' => $comic->id]) }}" title="{{ $comic->comic_name }}">
                                <img src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}">
                            </a>
                            <div class="view clearfix">
                              <span class="pull-left">
                                <i class="fa fa-eye">{{ $comic->number_views}}</i> <i class="fa fa-comment">{{ $comic->number_comments}}</i> <i class="fa fa-heart">{{ $comic->number_follows}}</i>
                              </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ route('details', ['comicId' => $comic->id]) }}">{{ $comic->comic_name }}</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                @foreach($comic->chapters as $chapter)
                                    <li class="chapter clearfix">
                                        <a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}">{{ $chapter->chapter_name }}</a>
                                        <i class="time">{{ $chapter->created_at->diffForHumans() }}</i>
                                    </li>
                                @endforeach
                            </ul>
                        </figcaption>
                    </div>
                </div>
                @endforeach
                <br>
                <!-- Phân trang -->
                <ul class="pagination justify-content-center" style="margin-top: 20px;">{{ $comics->links() }}</ul>
            </div>
        </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  function resetFilters() {
    document.getElementById("chapter").selectedIndex = 0;
    document.getElementById("status").selectedIndex = 0;
    document.getElementById("gender").selectedIndex = 0;
    document.getElementById("sort").selectedIndex = 0;
    // Uncheck all checkboxes
    var checkboxes = document.getElementsByName("genres[]");
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = false;
    }
  }

  $(document).ready(function(){
    $('.btn-collapse').click(function(){
        $(".advsearch-form").toggle();
        $('.show-text').toggleClass('hidden');
        $('.hide-text').toggleClass('hidden');
    });

    if (sessionStorage.getItem('formHidden') === 'true') {
      $(".advsearch-form").hide();
      $('.show-text').removeClass('hidden');
      $('.hide-text').addClass('hidden');
      sessionStorage.removeItem('formHidden');
    }

    $('form').submit(function(e){
      sessionStorage.setItem('formHidden', 'true');
    });
  });
</script>


@endsection
