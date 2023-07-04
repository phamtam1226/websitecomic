@extends('user.layout')
@section('content')

<!-- Slider chi tiết truyện -->

<div class="container-fluid">
    <ul class="breadcrumb bg-white">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $comic->comic_name }}</li>
    </ul>

    <h3 class="title-detail text-center" itemprop="name">{{ $comic->comic_name }}</h3>
    <div class="detail-info">

        <div class="row">
            <div class="col-md-4 col-image text-center">
                <img itemprop="image" class="ls-is-cached lazyloaded" src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}">
            </div>
            <div class="col-md-8 col-info" style="margin-top: 20px;">
                <ul class="list-info">

                    <li class="kind row">
                        <p class="col-md-10">
                            @foreach ($comic->genres as $genre)
                            <a itemprop="genre" class="btn btn-outline-danger" href="{{ route('comics_search.genre', ['genre' => $genre->id]) }}">{{ $genre->name }}</a>
                            @endforeach
                        </p>
                    </li>

                    <li class="author row">
                        <p class="name col-md-2">
                            <i class="fa fa-user">
                            </i> Tác Giả/Team Dịch
                        </p>
                        <p class="col-md-10">
                            <a itemprop="author">Đang cập nhât</a>
                        </p>
                    </li>
                    <li class="status row">
                        <p class="name col-md-2">
                            <i class="fa fa-rss">
                            </i> Tình trạng
                        </p>
                        <p class="col-md-10">
                            @if($comic->status == 0)
                                <a href="/advanced_comics_search?status=0">Đang tiến hành</a>
                            @else
                                <a href="/advanced_comics_search?status=1">Đã hoàn thành</a>
                            @endif
                        </p>
                    </li>

                    <li class="view row">
                        <p class="name col-md-2">
                            <i class="fa fa-eye">
                            </i> Lượt xem
                        </p>
                        <p class="col-md-10">{{ $comic->number_views}}</p>
                    </li>
                </ul>
                <div class="follow" id="followUser">
                    @if (session()->has('infoUser') == null)
                        <form class="hidden" id="FORM" enctype="multipart/form-data">
                            @csrf
                            <input style="display: none" name='comic_id' type="text" value="{{ $comic->id }}">
                            <input style="display: none" name='user_id' type="text" value="1">
                        </form>
                        <button class="btn btn-success" onclick="alert('Bạn cần đăng nhập trước')"><i class="fa fa-heart"></i> <span>Theo dõi</span></button>
                    @else
                        <?php $infoUser = session()->get('infoUser') ?>
                        <form class="hidden" id="FORM" enctype="multipart/form-data">
                            @csrf
                            <input style="display: none" name='comic_id' type="text" value="{{ $comic->id }}">
                            <input style="display: none" name='user_id' type="text" value="{{$infoUser['id']}}">
                        </form>
                        
                        @include('user.pages.button')
                    @endif
                    <span id="f_count">
                        <b>{{ $comic->number_follows }}</b> Người Đã Theo Dõi
                    </span>
                </div>
                <div class="read-action mrt10">
                    @if (isset($firstChapterId))
                        <a class="btn btn-warning mrb5 btn-doctu-dau" href="{{ route('chapter.details', ['chapterId' => $firstChapterId]) }}"><i class="fa fa-book" aria-hidden="true"></i> Đọc từ đầu</a>
                    @endif
                    @if (isset($lastChapterId))
                        <a class="btn btn-warning mrb5 btn-docmoinhat" href="{{ route('chapter.details', ['chapterId' => $lastChapterId]) }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Đọc mới nhất</a>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <br>
    <div class="detail-content">
        <h3 class="list-title"><i class="fa fa-info-circle"></i> Giới thiệu</h3>
        <hr style="color:red; opacity: 1; height: 2px;">
        <div id="descriptionContainer">
            <p id="summary" itemprop="description" class="shortened">{{ $comic->description }}</p>
            <a id="showMoreBtn" href="#">
                <i>Xem thêm +</i>
            </a>
        </div>
    </div>
    <br>
    <div class="list-chapter" id="nt_listchapter">
        <h2 class="list-title clearfix"><i class="fa fa-list"></i> Danh sách chương</h2>
        <hr style="color:red; opacity: 1; height: 2px;">
        <nav>
            <ul>
                <li class="row heading">
                    <div class="col-md-5 no-wrap"><b>Số chương</b></div>
                    <div class="col-md-4 no-wrap text-center"><b>Cập nhật</b></div>
                    <div class="col-md-3 no-wrap text-center"><b>Lượt xem</b></div>
                </li>
                @if(session()->has('infoUser'))
                <?php $infoUser = session()->get('infoUser') ?>
                <form method="POST">
                    @csrf
                    <input type="hidden" name="comic_id" hidden class="form-control" id="inputid_comic" value="{{$comic->id}}">
                    <input type="hidden" name="user_id" hidden class="form-control" id="id_userhistory" value="{{$infoUser['id']}}">
                    <div id="chapter_show"></div>
                </form>
                @else

                @foreach($chapter as $chapter)
                <li class="row ">
                    <div class="col-md-5 chapter">
                        @if($chapter->coin == 0)
                        <a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
                  @else
                  <a  type="button" onclick="alert('Bạn cần đăng nhập trước')" title="{{ $chapter->chapter_name }}"  data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }} <i class='fas fa-lock' ></i></a><span style="color: gold; float:right;">{{$chapter->coin}} <i class='fas fa-coins' style="color: gold;"></i></span>
                  @endif
                    </div>
                    <div class="col-md-4 text-center small">{{ $chapter->created_at->diffForHumans() }}</div>
                    <div class="col-md-3 text-center small"> {{ $chapter->number_view }}</div>
                </li>
                @endforeach
                @endif

            </ul>
           
        </nav>
    </div>

    <div style="float: right;">
        <div class="fb-share-button" data-href="{{\URL::current();}}" data-layout="" data-size=""><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2Fchapter%2F1&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
    </div>
    <div class="comment-detail">

        <ul class="nav nav-tabs lazy-module" id="nav-lick">
            <li class="active" data-id="1">
                <a href="javascript:;">
                    <i class="fa fa-comments"></i> Tổng bình luận (<span class="comment-count">{{ $comic->number_comments}}</span>)
                </a>


            </li>

        </ul>
        <div class="tab-content">

           
        </div>
        @foreach($comment as $comment)
        <div class="journalrow" id="{{$comment->id}}">

            <div class="author">
                <img alt="Author" src="{{ Storage::url($comment->user->avatar) }}">

            </div>

            <div class="journalitem">
                <div class="journalsummary">
                    <span class="authorname">{{$comment->user->name}}</span>
                    <span class="member">Thành viên</span>
                    <abbr title="7/7/2022 1:04:18 AM">
                        <i class="fa fa-clock-o"></i>{{ $comment->created_at->diffForHumans() }}
                    </abbr>
                    <span class="cmchapter">{{ $comment->chapter->chapter_name }}</span>
                    <span onclick="journalReport(this);" class="cmreport" id="report-32956">Báo vi phạm</span>
                    <div class="summary">{{$comment->content}}</div>
                </div>
            </div>
            <div class="listcmt">
                @foreach($commentreply as $cmtreply)
                @if($comment->id == $cmtreply->comment_id)

                <ul class="jcmt" id="jcmt-32999">

                    <li id="cmt-34431">
                        <img alt="Author" src="{{ Storage::url($comment->user->avatar) }}" onerror="this.onerror=null;this.src='https://img.baotangtruyenvip.com/upload02/content/images/avata.png';">
                        <div class="jsummary">
                            <i class="fa fa-angle-up"></i>
                            <span class="authorname">{{$cmtreply->user->name}}</span>
                            <span class="member">Thành viên</span>
                            <abbr title="7/17/2022 7:10:43 PM">
                                <i class="fa fa-clock-o"></i> {{ $cmtreply->created_at->diffForHumans() }}
                            </abbr>
                            <span onclick="journalReport(this);" class="cmreport" id="report-34431">Báo vi phạm</span>
                            <div class="summary"> <span>
                                    <i class="fa fa-mail-forward"> {{$comment->user->name}}</i> {{ $cmtreply->content_reply }}</div>
                            </span>
                        </div>
                    </li>
                </ul>
                @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
<br>

<style>
    #descriptionContainer {
    /* Điều chỉnh khoảng cách giữa mô tả và nút "Xem thêm" / "Thu gọn" */
    padding-bottom: 10px;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
$('#showMoreBtn').on('click', function(event){
    event.preventDefault();
    var summaryElement = $('#summary');
    if (summaryElement.css('overflow') === 'hidden') {
        summaryElement.css('overflow', 'visible');
        summaryElement.css('height', 'auto');
        $(this).text('Thu gọn -');
    } else {
        summaryElement.css('overflow', 'hidden');
        summaryElement.css('height', '100px'); 
        $(this).text('Xem thêm +');
    }
});
</script>
@stop