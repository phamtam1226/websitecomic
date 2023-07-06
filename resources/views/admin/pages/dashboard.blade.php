@extends('admin.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Chào mừng Admin Comic</h3>

                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="https://th.bing.com/th/id/R.3bea9f7f5c30911f879cc9acd5d11a7e?rik=IbPG64YkyFCwTw&riu=http%3a%2f%2fct.mob0.com%2fStyles%2fComic.png&ehk=tSYZQoUVIRMpkhAtH9%2bKnz4vrtY21yt5Y%2buZp4oe%2fQ4%3d&risl=&pid=ImgRaw&r=0" alt="people" style="width:300px">
                        <div class="weather-info">
                            <div class="d-flex">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Thống Kê Theo Đơn Hàng Trong Tháng</p>
                                <p class="fs-30 mb-2">{{$totalMoneyInMonth}} VND</p>
                                <p>0 VND (1 Tháng)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Tổng Số Khách Hàng Trong Tháng</p>
                                <p class="fs-30 mb-2">{{$totalAccountInMonth}}</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Tổng Đơn Hàng Trong Tháng</p>
                                <p class="fs-30 mb-2">{{$totalBillInMonth}}</p>

                            </div>
                        </div>
                    </div>



                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Tổng Số Truyện</p>
                                <p class="fs-30 mb-2">{{$app_product}}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Biểu Đồ Thống Kê Đơn Hàng</p>
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                        <figure class="highcharts-figure">
                            <div id="container"></div>

                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Doanh thu đơn hàng từng năm</p>
                            <!-- <a href="#" class="text-info">Xem tất cả</a> -->
                        </div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">COMIC © 2023. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Thiết kế bởi __</a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<style>
    .card-people {
        position: relative;
        padding-top: 20px;
        text-align: center;
        margin-bottom: auto;
    }
</style>

@stop