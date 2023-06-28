@extends('user.layout')
@section('content')

<div class="container-fluid">
    <ul class="breadcrumb bg-white">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details', ['comicId' => $chapter->comic->id]) }}">{{ $chapter->comic->comic_name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $chapter->chapter_name }}</li>
    </ul>

    <div id="tr-menu-fix2">
        <div class="container">
        </div>
    </div>
    <div>
        <h3 class="title-chapter" itemprop="name">{{ $chapter->comic->comic_name }} - {{ $chapter->chapter_name }}</h3>
        <div class="reading-control text-center">
            <form action="/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" id="formToken" method="post">
                <input name="__RequestVerificationToken" type="hidden" value="eN3VPBjCanBN2pdnd_s2WkANat5bTBHwUuwpK-suCipmVryCbIHLyLsFJtakRiEOOTm7NjnX2i-mU31Lf8EZMqaTjRbcgnRgwz8TIdT4fzI1">
            </form>
            <span class="chapter-id hidden" data-cdn="https://baotangtruyengo.com" data-cdn2="" data-suffix=""></span>
            <button type="button" class="btn btn-warning" id="chapter_error" style="display: inline-block;" onclick="ErrorSubmit()">
                <span class="mdi mdi-information-outline"></span> Báo lỗi chương
            </button>

            @if (session()->has('infoUser') == null)
                <form class="hidden" id="FORM" enctype="multipart/form-data">
                    @csrf
                    <input style="display: none" name='comic_id' type="text" value="{{ $chapter->comic->id }}">
                    <input style="display: none" name='user_id' type="text" value="1">
                </form>
                <button class="btn btn-success" onclick="alert('Bạn cần đăng nhập trước')"><i class="fa fa-heart"></i> <span>Theo dõi</span></button>
            @else
                <?php $infoUser = session()->get('infoUser') ?>
                <form class="hidden" id="FORM" enctype="multipart/form-data">
                    @csrf
                    <input style="display: none" name='comic_id' type="text" value="{{ $chapter->comic->id }}">
                    <input style="display: none" name='user_id' type="text" value="{{$infoUser['id']}}">
                </form>

                @include('user.pages.button')
            @endif

            <div class="chapter-nav" id="chapter-nav" style="z-index: 1000;">
                <a class="home" href="{{ url('/') }}" title="Trang chủ"><i class="fa fa-home"></i></a>
                <a class="home backward" href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su-229#nt_listchapter" title="TOÀN CHỨC PHÁP SƯ"><i class="fa fa-list"></i></a>
                <a class="home changeserver" href="javascript:;" title="Đổi server"><i class="fa fa-undo error"></i><span>1</span></a>

                <a id="prevChapter" href="{{ $prevChapter ? route('chapter.details', ['chapterId' => $prevChapter->id]) : '#' }}" class="prev a_prev chapterview" data-id="{{ $chapter->id }}"><i class="fa fa-angle-left"></i></a>

                <select name="ctl00$mainContent$ddlSelectChapter" class="select-chapter ctl00_mainContent_ddlSelectChapter " onchange="redirectToChapter(this.value)" >
                    @foreach ($chapter->comic->chapters as $comicChapter)
                    <option class="chapterview" data-id="{{ $comicChapter->id }}" value="{{ $comicChapter->id }}" {{ $comicChapter->id == $chapter->id ? 'selected' : '' }} >
                   {{ $comicChapter->chapter_name }}
                    </option>
                    @endforeach
                </select>

                <a id="nextChapter" href="{{ $nextChapter ? route('chapter.details', ['chapterId' => $nextChapter->id]) : '#' }}" class="next a_next chapterview"  data-id="{{ $chapter->id }}"><i class="fa fa-angle-right"></i></a>

                <!-- <a class="follow-link btn btn-success" href="javascript:void(0)" data-id="{{ $chapter->comic->id }}" onclick="story.FollowStory('{{ $chapter->comic->id }}')">
                    <i class="fa fa-heart"></i> <span>Theo dõi</span>
                </a>
                 -->
            </div>
        </div>

        <div class="reading-detail box_doc text-center">
            @foreach ($chapter->images as $index => $image)
            <div id="page_{{ $index }}" class="page-chapter">
                <img class="lazyload" data-index="{{ $index }}" src="{{ Storage::url($image->image_path) }}">
            </div>
            @endforeach
        </div>

        <div class="top bottom">
            <div class="chapter-nav-bottom" style="margin:5px 0;text-align:center">
                <div class="chapter-nav-bottom text-center mrt5 mrb5">
                    <a href="{{ $prevChapter ? route('chapter.details', ['chapterId' => $prevChapter->id]) : '#' }}" class="btn btn-danger prev chapterview" data-id="{{ $chapter->id }}"><em>&lt;</em> Chap trước</a>
                    <a href="{{ $nextChapter ? route('chapter.details', ['chapterId' => $nextChapter->id]) : '#' }}" class="btn btn-danger next chapterview" data-id="{{ $chapter->id }}">Chap sau <em>&gt;</em></a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link  active" id="tab-topmonth" data-toggle="tab" href="#content-topmonth" role="tab" aria-controls="content-topmonth" aria-selected="true">
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="chapter_id" hidden class="form-control" id="inputid_chapter" value="{{$chapter->id}}">
                        <div id="number_comment"></div>
                    </form>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-topweek" data-toggle="tab" href="#content-topweek" role="tab" aria-controls="content-topweek" aria-selected="false">
                    Bình luận Facbook
                </a>
            </li>

        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade  show active" id="content-topmonth" role="tabpanel" aria-labelledby="tab-topmonth">
                <div class="tab-pane">
                    <div id="topMonth">
                        <ul class="list-unstyled relative">
                        <h4>Thêm nhận xét</h4>
                            <div class="tab-content">
                          
                                <form method="POST">

                                    @csrf
        
                                    <div class="add-comment">
                                       
                                        @if(session()->has('infoUser'))
                                        <?php $infoUser = session()->get('infoUser') ?>
                                        <input class="form-control" type="text" name="user_name" readonly placeholder="Bạn hãy nhập tên..." id="inputname" value="{{$infoUser['name']}}" required="">
                                        <div class="form-outline  mb-4">
                                            <textarea name="content" id="inputcontent" class="form-control" id="textAreaExample6" rows="3" required=""></textarea>
                                        </div>

                                        <input type="hidden" name="user_id" hidden class="form-control" id="inputid_user" value="{{$infoUser['id']}}">
                                        <input type="hidden" name="chapter_id" hidden class="form-control" id="inputid_chapter" value="{{$chapter->id}}">
                                        <input type="hidden" name="comic_id" hidden class="form-control" id="inputid_comic" value="{{$chapter->comic->id}}">
                                        <input type="hidden" name="status" hidden class="form-control" id="inputstatus" value="1">
                                        <div id="notify_comment"></div>
                                        <button type="button" class="btn btn-primary" id="submitBinhLuan">Gửi</button>
                                        @else
                                        <a href="{{route('getLogin')}}" class="btn hvr-hover">Vui lòng đăng nhập để bình luận</a>
                                        @endif
                                </form>
                            </div>
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="chapter_id" hidden class="form-control" id="inputid_chapter" value="{{$chapter->id}}">
                                <div id="comment_show"></div>
                            </form>
                        </ul>
                    </div>
                    <div id="topWeek">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="content-topweek" role="tabpanel" aria-labelledby="tab-topweek">
                <ul class="list-unstyled ">
                    <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="10"></div>
                </ul>
            </div>
        </div>
    </div>
</div>

<br>

@stop