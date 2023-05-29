@extends('user.layout')
@section('content')


<!-- Slider truyện đề cử -->

<div class="container-fluid ">

    <ul class="breadcrumb bg-white">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tìm Truyện</li>
    </ul>
    <div class="comic-filter">
        <h3 class="text-center" itemprop="name">Action</h3>
        <ul id="ctl00_mainContent_ctl00_ulStatus" class="nav nav-tabs">
            <li class="active"><a class="btn btn-outline-primary" href="#">Tất cả</a></li>
            <li class=""><a class="btn btn-outline-primary" href="#">Hoàn thành</a></li>
            <li class=""><a class="btn btn-outline-primary" href="#">Đang tiến hành</a></li>
        </ul>
    </div>
    <br>
    <div id="ctl00_mainContent_ctl00_divSort" class="sort-by row">
        <div class="col-sm-2 mrt5 mrb5">
            Sắp xếp theo:
        </div>
        <div class="col-sm-10">
            <div class="hidden-xs">
                <a rel="nofollow " class="btn btn-outline-dark " href="#"><i class="fa fa-eye"></i> Top ngày</a>
                <a rel="nofollow " class="btn btn-outline-dark " href="#"><i class="fa fa-eye"></i> Top tuần</a>
                <a rel="nofollow " class="btn btn-outline-dark " href="#"><i class="fa fa-eye"></i> Top tháng</a>
                <a rel="nofollow " class="btn btn-outline-dark " href="#"><i class="fa fa-eye"></i> Top all</a>
                <a rel="nofollow " class="btn btn-outline-dark " href="#"><i class="fa fa-heart"></i> Theo dõi</a>
                <a rel="nofollow " class="btn btn-outline-dark " href="#"><i class="fa fa-comment"></i> Bình luận</a>
                <a rel="nofollow " class="btn btn-outline-dark " href="#"><i class="fa fa-sort-amount-desc"></i> Truyện mới</a>
                <a rel="nofollow " class="btn btn-outline-dark " href="#"><i class="fa fa-list"></i> Số chapter</a>
                <a class="btn btn-outline-dark" href="#"><i class="fa fa-sort-amount-desc"></i> Ngày cập nhật</a>
            </div>
            
        </div>
        
    </div>
    <br>
    <div class="row">
        <!-- truyện mới -->
        <div class="col-md-12 col-sm-6 ">

            <div class="row">
                <!-- truyện -->
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">

                        <div class="image">
                            <img src="https://img.baotangtruyenvip.com/Upload/AvatarStory/20210915/toan-chuc-phap-su.jpg" alt="TO&#192;N CHỨC PH&#193;P SƯ">

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> 264K <i class="fa fa-comment"></i> 15 <i class="fa fa-heart"></i> 237
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>
                                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ url('/details') }}">TO&#192;N CHỨC PH&#193;P SƯ</a>
                            </h3>
                            <ul style=" list-style-type: none;">
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" title="Chapter 1036">Chapter 1036</a>
                                    <i class="time">21 ph&#250;t trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" title="Chapter 1035">Chapter 1035</a>
                                    <i class="time">2 ng&#224;y trước</i>
                                </li>
                                <li class="chapter clearfix">
                                    <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" title="Chapter 1034">Chapter 1034</a>
                                    <i class="time">7 ng&#224;y trước</i>
                                </li>
                            </ul>
                        </figcaption>
                    </div>
                </div>
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
@stop