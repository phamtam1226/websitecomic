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
                    <span class="show-text hidden">Hiện </span>
                    <span class="hide-text">Ẩn </span>khung tìm kiếm <i class="fa fa-angle-double-up"></i>
                </button>
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
            <div class="form-group clearfix">
            <label class="col-sm-2 control-label mrt5 mrt5">Thể loại</label>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-6 mrb10">
                  <div class="genre-item">
                    <label>
                      <input type="checkbox" name="genres[]" value="action"> Action
                    </label>
                  </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6 mrb10">
                  <div class="genre-item">
                    <label>
                      <input type="checkbox" name="genres[]" value="adventure"> Adventure
                    </label>
                  </div>
                </div>
                <!-- Thêm các thể loại khác tại đây -->
              </div>
            </div>
          </div>
        <div class="form-group clearfix">
            <div class="col-sm-2 control-label mrt5">
                <label for="status">Số lượng chapter</label>
            </div>
            <div class="col-sm-4">
                <select class="form-control" id="chapter" name="chapter">
                    <option value="">Tất cả</option>
                    <option value="0">>= 0 chapter</option>
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
                <select class="form-control select-status">
                    <option value="1">Đang tiến hành</option>
                    <option value="2">Đã hoàn thành</option>
                    <option selected="selected" value="-1">Tất cả</option>
                </select>
            </div>
        </div>
          <div class="form-group">
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
                <option value="chapter">Chapter mới</option>
                <option value="newest">Truyện mới</option>
                <option value="most_view">Xem nhiều nhất</option>
                <option value="most_follow">Theo dõi nhiều nhất</option>
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
    </div>
  </div>
</div>

<style>
    .col-md-12 {
        margin-top: 40px;
    }
    .mrt5 {
        margin-top: 5px;
    }
    .row {
        margin-left: -15px;
        margin-right: -15px;
    }
    .col-sm-4 {
        width: 33.33333333%;
        float: left;
    }
    label {
        margin-bottom: 5px;
        font-weight: 700;
        display: inline-block;
    }
    .col-sm-10 {
        width: 83.33333333%;
        float: right;
    }
    .mrb10 {
        margin-bottom: 10px;
    }
    .mrb5 {
        margin-bottom: 5px;
    }
    .comic-filter h1 {
        font-size: 25px;
    }
    .btn-info {
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da;
    }
    .hidden {
        display: none!important;
    }
    .form-group {
        margin-bottom: 15px;
    }
</style>

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
</script>
@endsection
