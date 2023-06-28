@extends('user.layout')
@section('content')

<!-- Slider truyện đề cử -->

<div class="container-fluid ">

    <ul class="breadcrumb bg-white">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('comics_search') }}">Thể Loại</a></li>
        @if($selectedGenre)
            <li class="breadcrumb-item active" aria-current="page">{{ $selectedGenre->name }}</li>
        @else
            <li class="breadcrumb-item active" aria-current="page">Tất cả</li>
        @endif
    </ul>

    <div class="comic-filter">
        <h3 class="text-center" itemprop="name">
            @if ($selectedGenre)
                {{ $selectedGenre->name }}
            @else
                Tất cả
            @endif
        </h3>
        <ul id="ctl00_mainContent_ctl00_ulStatus" class="nav nav-tabs">
            <li class="active" id="sta_btn" value="2"><a class="btn btn-outline-primary">Tất cả</a></li>
            <li class="" id="sta_btn" value="0"><a class="btn btn-outline-primary">Hoàn thành</a></li>
            <li class="" id="sta_btn" value="1"><a class="btn btn-outline-primary">Đang tiến hành</a></li>
        </ul>
    </div>
    <br>
    <div id="ctl00_mainContent_ctl00_divSort" class="sort-by row">
        <div class="col-sm-2 mrt5 mrb5">
            Sắp xếp theo:
        </div>
        <div class="col-sm-10">
            <div class="hidden-xs">
                <a rel="nofollow " class="btn btn-outline-dark" id="fil_btn" data-value="day"><i class="fa fa-eye"></i> Top ngày</a>
                <a rel="nofollow " class="btn btn-outline-dark " id="fil_btn" data-value="wek"><i class="fa fa-eye"></i> Top tuần</a>
                <a rel="nofollow " class="btn btn-outline-dark " id="fil_btn" data-value="mon"><i class="fa fa-eye"></i> Top tháng</a>
                <a rel="nofollow " class="btn btn-outline-dark  active" id="fil_btn" data-value="all"><i class="fa fa-eye"></i> Top all</a>
                <a rel="nofollow " class="btn btn-outline-dark " id="fil_btn" data-value="fol"><i class="fa fa-heart"></i> Theo dõi</a>
                <a rel="nofollow " class="btn btn-outline-dark " id="fil_btn" data-value="cmt"><i class="fa fa-comment"></i> Bình luận</a>
                <a rel="nofollow " class="btn btn-outline-dark " id="fil_btn" data-value="new"><i class="fa fa-sort-amount-desc"></i> Truyện mới</a>
                <a rel="nofollow " class="btn btn-outline-dark " id="fil_btn" data-value="cha"><i class="fa fa-list"></i> Số chapter</a>
                <a rel="nofollow " class="btn btn-outline-dark " id="fil_btn" data-value="upt"><i class="fa fa-sort-amount-desc"></i> Ngày cập nhật</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- truyện mới -->
        <div class="col-md-12 col-sm-6 " id="comiclist">
            <!-- <div class="row"> -->
                <!-- truyện -->
                @foreach($comics as $comic)
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">
                        <div class="image">
                            <a href="{{ route('details', ['comicId' => $comic->id]) }}" title="{{ $comic->comic_name }}">
                                <img src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}">
                            </a>
                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> <i class="fa fa-comment"></i> <i class="fa fa-heart"></i>
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
                <ul class="pagination justify-content-center ">

                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">20</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> 
<script>
    $("[id='sta_btn']").click(function() {
        $("[id='sta_btn']").removeClass("active");
        $(this).addClass("active");
        $('#comiclist').load('/foundcomic/'+$('#sta_btn.active').attr("value")+'/'+$('#fil_btn.active').attr("data-value"))
    });
    $("[id='fil_btn']").click(function() {
        $("[id='fil_btn']").removeClass("active");
        $(this).addClass("active");
        $('#comiclist').load('/foundcomic/'+$('#sta_btn.active').attr("value")+'/'+$('#fil_btn.active').attr("data-value"))
        //console.log($('#fil_btn.active').attr("data-value"));
    });
    $('#comiclist').load('/foundcomic/-1/1')
</script>
@stop
