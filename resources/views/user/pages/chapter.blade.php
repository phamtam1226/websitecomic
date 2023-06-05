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

            <div class="chapter-nav" id="chapter-nav" style="z-index: 1000;">
                <a class="home" href="{{ url('/') }}" title="Trang chủ"><i class="fa fa-home"></i></a>
                <a class="home backward" href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su-229#nt_listchapter" title="TOÀN CHỨC PHÁP SƯ"><i class="fa fa-list"></i></a>
                <a class="home changeserver" href="javascript:;" title="Đổi server"><i class="fa fa-undo error"></i><span>1</span></a>

                <a id="prevChapter" href="{{ $prevChapter ? route('chapter.details', ['chapterId' => $prevChapter->id]) : '#' }}" class="prev a_prev"><i class="fa fa-angle-left"></i></a>

                <select name="ctl00$mainContent$ddlSelectChapter" class="select-chapter ctl00_mainContent_ddlSelectChapter" onchange="redirectToChapter(this.value)">
                    @foreach ($chapter->comic->chapters as $comicChapter)
                        <option value="{{ $comicChapter->id }}" {{ $comicChapter->id == $chapter->id ? 'selected' : '' }}>
                            {{ $comicChapter->chapter_name }}
                        </option>
                    @endforeach
                </select>

                <a id="nextChapter" href="{{ $nextChapter ? route('chapter.details', ['chapterId' => $nextChapter->id]) : '#' }}" class="next a_next"><i class="fa fa-angle-right"></i></a>


                <a class="follow-link btn btn-success" href="javascript:void(0)" data-id="{{ $chapter->comic->id }}" onclick="story.FollowStory('{{ $chapter->comic->id }}')">
                    <i class="fa fa-heart"></i> <span>Theo dõi</span>
                </a>
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
                    <a href="{{ $prevChapter ? route('chapter.details', ['chapterId' => $prevChapter->id]) : '#' }}" class="btn btn-danger prev"><em>&lt;</em> Chap trước</a>
                    <a href="{{ $nextChapter ? route('chapter.details', ['chapterId' => $nextChapter->id]) : '#' }}" class="btn btn-danger next">Chap sau <em>&gt;</em></a>
                </div>
            </div>
        </div>
    </div>

        <!-- bình luận -->
    <div class="comment-detail">
        <ul class="nav nav-tabs lazy-module" id="nav-lick">
            <li class="active" data-id="1">
                <a href="javascript:;">
                    <i class="fa fa-comments"></i> Tổng bình luận (<span class="comment-count">15</span>)
                </a>
            </li>
        </ul>
        <div class="tab-content">

        </div>
        <div class="journalrow" id="jid-32956">
            <div class="author">
                <img alt="Author" src="https://img.baotangtruyenvip.com/Content/Images/avata.png" onerror="this.onerror=null;this.src='https://img.baotangtruyenvip.com/upload02/content/images/avata.png';">
                <span class="cmreply" onclick="addreplyclick(this)" id="cmtbtn-32956">Trả lời</span>
            </div>
            <div class="journalitem">
                <div class="journalsummary">
                    <span class="authorname">Bee</span>
                    <span class="member">Thành viên</span>
                    <abbr title="7/7/2022 1:04:18 AM">
                        <i class="fa fa-clock-o"></i> 10 tháng trước
                    </abbr>
                    <span class="cmchapter">Chapter 7</span>
                    <span onclick="journalReport(this);" class="cmreport" id="report-32956">Báo vi phạm</span>
                    <div class="summary">Má chap này bùn ghê tự nhiên 2 người này die lun<img src="http://4.bp.blogspot.com/_1Jw2fzSntT0/TZDLE6-U1TI/AAAAAAAABQw/_34TK1gvp-A/w1600/019.gif" alt="emo">&nbsp;mé cay tác giả quáaaa</div>
                </div>
            </div>
            <ul class="jcmt" id="jcmt-32999">

                <li id="cmt-34431">
                    <img alt="Author" src="https://baotangtruyengo.com/content/images/avata.png" onerror="this.onerror=null;this.src='https://img.baotangtruyenvip.com/upload02/content/images/avata.png';">
                    <div class="jsummary">
                    <i class="fa fa-angle-up"></i>
                    <span class="authorname">Ri đỗ</span>
                    <span class="member">Thành viên</span>
                        <abbr title="7/17/2022 7:10:43 PM">
                            <i class="fa fa-clock-o"></i> 10 tháng trước
                        </abbr>
                        <span onclick="journalReport(this);" class="cmreport" id="report-34431">Báo vi phạm</span>
                        <div class="summary">sao pháp sư trong chuyện này ko bá như mấy pháp sư trong truyện khác nhờ</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<br>
@stop
