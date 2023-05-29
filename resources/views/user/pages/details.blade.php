@extends('user.layout')
@section('content')


<!-- Slider truyện đề cử -->

<div class="container-fluid">
    <ul class="breadcrumb bg-white">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Toàn Chức Pháp Sư</li>
    </ul>

    <h3 class="title-detail text-center" itemprop="name">TOÀN CHỨC PHÁP SƯ</h3>
    <div class="detail-info">

        <div class="row">
            <div class="col-md-4 col-image text-center">
                <img itemprop="image" class="ls-is-cached lazyloaded" src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TOÀN CHỨC PHÁP SƯ">
            </div>
            <div class="col-md-8 col-info">
                <ul class="list-info">
                    <li class="kind row">
                        <p class="col-md-10">

                            <a itemprop="genre" class="btn btn-outline-danger" href="#">Đang cập nhật</a>
                        </p>
                    </li>
                    <li class="author row">
                        <p class="name col-md-2">
                            <i class="fa fa-user">
                            </i> Tác Giả/Team Dịch
                        </p>
                        <p class="col-md-10">
                            <a itemprop="author" href="https://baotangtruyengo.com/tim-truyen?tac-gia=Đang tiến hành">Đang tiến hành</a>
                        </p>
                    </li>
                    <li class="status row">
                        <p class="name col-md-2">
                            <i class="fa fa-rss">
                            </i> Tình trạng
                        </p>
                        <p class="col-md-10">Đang cập nhật</p>
                    </li>

                    <li class="view row">
                        <p class="name col-md-2">
                            <i class="fa fa-eye">
                            </i> Lượt xem
                        </p>
                        <p class="col-md-10">265,354</p>
                    </li>
                </ul>
                <div class="follow" id="followUser">
                    <a class="follow-link btn btn-success btn-theodoi" href="javascript:void(0)" data-id="229" onclick="story.FollowStory('229')"><i class="fa fa-heart"></i> <span>Theo dõi</span></a>
                    <span>
                        <b>237</b> Người Đã Theo Dõi
                    </span>
                </div>
                <div class="read-action mrt10">
                    <a class="btn btn-warning mrb5 btn-doctu-dau" href="#"><i class="fa fa-book" aria-hidden="true"></i> Đọc từ đầu</a>
                    <a class="btn btn-warning mrb5 btn-docmoinhat" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Đọc mới nhất</a>

                </div>

            </div>

        </div>

    </div>
    <br>
    <div class="detail-content">
        <h3 class="list-title"><i class="fa fa-info-circle"></i> Giới thiệu</h3>
        <hr style="color:red; opacity: 1; height: 2px;">
        <p id="summary" itemprop="description" class="shortened">Tỉnh lại sau giấc ngủ, thế giới đại biến. Quen thuộc cao trung truyền thụ chính là phép thuật, nói cho mọi người muốn trở thành một tên xuất sắc Ma Pháp Sư. Ở lại đô thị ở ngoài du đãng tập kích nhân loại ma vật yêu thú, mắt nhìn chằm chằm. Tôn trọng khoa học thế giới đã biến thành tôn trọng phép thuật, một mực có như nhau lấy học tra đối xử giáo viên của chính mình, như nhau ánh mắt dị dạng bạn học, như nhau xã hội tầng dưới chót giãy dụa ba ba, như nhau thuần mỹ nhưng không thể bước đi không phải huyết thống muội muội... Bất quá, Mạc Phàm phát hiện tuyệt đại đa số người đều chỉ có thể chủ tu nhất hệ phép thuật, chính mình nhưng là toàn hệ toàn năng pháp sư!</p>
        <a href="javascript:;" class="c">Xem thêm <i class="fa fa-angle-right"></i></a>
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

                <li class="row ">
                    <div class="col-md-5 chapter">
                        <a href="https://baotangtruyengo.com/truyen-tranh/chapter-1036/chapter-1036/782611" data-id="782611">Chapter 10</a>
                    </div>
                    <div class="col-md-4 text-center small">1 ngày trước</div>
                    <div class="col-md-3 text-center small"> 23</div>
                </li>

                <li class="row ">
                    <div class="col-md-5 chapter">
                        <a href="https://baotangtruyengo.com/truyen-tranh/chapter-1035/chapter-1035/781826" data-id="781826">Chapter 9</a>
                    </div>
                    <div class="col-md-4 text-center small">4 ngày trước</div>
                    <div class="col-md-3 text-center small"> 27</div>
                </li>

                <li class="row ">
                    <div class="col-md-5 chapter">
                        <a href="https://baotangtruyengo.com/truyen-tranh/chapter-1034/chapter-1034/780545" data-id="780545">Chapter 8</a>
                    </div>
                    <div class="col-md-4 text-center small">9 ngày trước</div>
                    <div class="col-md-3 text-center small"> 31</div>
                </li>

                <li class="row ">
                    <div class="col-md-5 chapter">
                        <a href="https://baotangtruyengo.com/truyen-tranh/chapter-1033/chapter-1033/779424" data-id="779424">Chapter 7</a>
                    </div>
                    <div class="col-md-4 text-center small">13 ngày trước</div>
                    <div class="col-md-3 text-center small"> 42</div>
                </li>

                <li class="row ">
                    <div class="col-md-5 chapter">
                        <a href="https://baotangtruyengo.com/truyen-tranh/chapter-1032/chapter-1032/779184" data-id="779184">Chapter 6</a>
                    </div>
                    <div class="col-md-4 text-center small">14 ngày trước</div>
                    <div class="col-md-3 text-center small"> 27</div>
                </li>

                <li class="row ">
                    <div class="col-md-5 chapter">
                        <a href="https://baotangtruyengo.com/truyen-tranh/chapter-1031/chapter-1031/778644" data-id="778644">Chapter 5</a>
                    </div>
                    <div class="col-md-4 text-center small">16 ngày trước</div>
                    <div class="col-md-3 text-center small"> 28</div>
                </li>

                <li class="row ">
                    <div class="col-md-5 chapter">
                        <a href="https://baotangtruyengo.com/truyen-tranh/chapter-1030/chapter-1030/777590" data-id="777590">Chapter 4</a>
                    </div>
                    <div class="col-md-4 text-center small">20 ngày trước</div>
                    <div class="col-md-3 text-center small"> 29</div>
                </li>

                <li class="row ">
                    <div class="col-md-5 chapter">
                        <a href="https://baotangtruyengo.com/truyen-tranh/chapter-1030/chapter-1030/777590" data-id="777590">Chapter 3</a>
                    </div>
                    <div class="col-md-4 text-center small">20 ngày trước</div>
                    <div class="col-md-3 text-center small"> 29</div>
                </li>

                <li class="row ">
                    <div class="col-md-5 chapter">
                        <a href="https://baotangtruyengo.com/truyen-tranh/chapter-1030/chapter-1030/777590" data-id="777590">Chapter 2</a>
                    </div>
                    <div class="col-md-4 text-center small">20 ngày trước</div>
                    <div class="col-md-3 text-center small"> 29</div>
                </li>

                <li class="row ">
                    <div class="col-md-5 chapter">
                        <a href="https://baotangtruyengo.com/truyen-tranh/chapter-1030/chapter-1030/777590" data-id="777590">Chapter 1</a>
                    </div>
                    <div class="col-md-4 text-center small">20 ngày trước</div>
                    <div class="col-md-3 text-center small"> 29</div>
                </li>


            </ul>
            <a class="hidden view-more" href="javascript:;">
                <i class="fa fa-plus ">
                </i> Xem thêm
            </a>
        </nav>
    </div>
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