@extends('admin.layout')
@section('content')
<!-- partial -->
<style>
    #container {
        height: 400px;
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #datatable {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    #datatable caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    #datatable th {
        font-weight: 600;
        padding: 0.5em;
    }

    #datatable td,
    #datatable th,
    #datatable caption {
        padding: 0.5em;
    }

    #datatable thead tr,
    #datatable tr:nth-child(even) {
        background: #f8f8f8;
    }

    #datatable tr:hover {
        background: #f1f7ff;
    }
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Chào mừng TAM Books Store</h3>

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
                        <img src="images/dashboard/people.svg" alt="people">
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
                                <p class="fs-30 mb-2">{{number_format($totalMoneyInMonth,0,",",",")}} VND</p>
                                <p>{{number_format($totalMoneyInMonth,0,",",",")}} VND (1 Tháng)</p>
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
                                <p class="mb-4">Tổng Số Sản Phẩm</p>
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            Chart showing how an HTML table can be used as the data source for the
            chart using the Highcharts data module. The chart is built by
            referencing the existing HTML data table in the page. Several common
            data source types are available, including CSV and Google Spreadsheet.
        </p>

        <table id="datatable">
            <thead>
                <tr>
                    <th></th>
                    <th>Boys</th>
                    <th>Girls</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>2016</th>
                    <td>30 386</td>
                    <td>28 504</td>
                </tr>
                <tr>
                    <th>2017</th>
                    <td>29 173</td>
                    <td>27 460</td>
                </tr>
                <tr>
                    <th>2018</th>
                    <td>28 430</td>
                    <td>26 690</td>
                </tr>
                <tr>
                    <th>2019</th>
                    <td>28 042</td>
                    <td>26 453</td>
                </tr>
                <tr>
                    <th>2020</th>
                    <td>27 063</td>
                    <td>25 916</td>
                </tr>
                <tr>
                    <th>2021</th>
                    <td>28 684</td>
                    <td>27 376</td>
                </tr>
            </tbody>
        </table>
    </figure>

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">TAM © 2022. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Thiết kế bởi TAM</a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
@include('admin.pages.dashboardChart')

@stop
<script>
    Highcharts.chart('container', {
        data: {
            table: 'datatable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Live births in Norway'
        },
        subtitle: {
            text: 'Source: <a href="https://www.ssb.no/en/statbank/table/04231" target="_blank">SSB</a>'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Amount'
            }
        }
    });
</script>
<script>
    // Dữ liệu cho biểu đồ
    var data = {
        labels: ['Dữ liệu 1', 'Dữ liệu 2', 'Dữ liệu 3'],
        datasets: [{
            label: 'Biểu Đồ Cột',
            data: [10, 20, 30],
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Cấu hình biểu đồ
    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Lấy thẻ canvas và vẽ biểu đồ cột
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>