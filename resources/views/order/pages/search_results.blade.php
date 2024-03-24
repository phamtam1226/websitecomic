@extends('user.layout')
@section('content')

<!-- Slider truyện đề cử -->

<div class="container-fluid ">


    <div class="food-filter">
        <h3 class="text-center" itemprop="name">
            Tìm truyện tranh
        </h3>
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
    @if (count($food) > 0)
    <div class="row">
        <!-- truyện mới -->
        <div class="col-md-12 col-sm-6 ">
            <div class="row">
                <!-- truyện -->
                @foreach($food as $food)
                <div class="col-6 col-sm-6 col-md-2 p-2">
                    <div class="d-flex flex-column border height100">
                        <div class="image">
                            <a href="{{ route('details', ['foodId' => $food->id]) }}">
                                <img src="{{ $food->cover_image }}" alt="{{ $food->food_name }}">
                            </a>

                            <div class="view clearfix">
                                <span class="pull-left">
                                    <i class="fa fa-eye"></i> <i class="fa fa-comment"></i> <i class="fa fa-heart"></i>
                                </span>
                            </div>
                        </div>
                        <figcaption>
                            <h3>{{ $food->food_name }}</h3>

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
    @else
    <p>Không tìm thấy truyện phù hợp với từ khóa "{{ request()->input('keyword') }}"</p>
    @endif
</div>
<br>
@stop