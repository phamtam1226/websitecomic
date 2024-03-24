@extends('admin.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Thống Kê Doanh Thu</h3>
                    </div>

                    <div class="col-12 col-xl-8 mb-4 mb-xl-0" style="padding-top:20px">
                        <!-- /.card-header -->

                        <a class="btn btn-primary" href="{{ route('admin.employee.create')}}" style="padding: 0.7rem 1.5rem; border-radius: 10px; margin-left:10px;">Thống Kê Trong Tuần</a>
                        <a class="btn btn-primary" href="{{ route('admin.employee.create')}}" style="padding: 0.7rem 1.5rem; border-radius: 10px; margin-left:10px;">Thống Kê Trong Quý</a>
                        <a class="btn btn-primary" href="{{ route('admin.employee.create')}}" style="padding: 0.7rem 1.5rem; border-radius: 10px; margin-left:10px;">Thống Kê Trong Năm</a>



                    </div>

                </div>
                <br>
                <div class="card" style="width: 820px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Thống kê doanh thu trong năm</p>
                            <!-- <a href="#" class="text-info">Xem tất cả</a> -->

                        </div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function ComfirmDelete() {
        var txt;
        if (confirm("Bạn có muốn xóa thể loại đã chọn?")) {
            return true;
        }
        return false;
    }
</script>

<script>
    // Dữ liệu cho biểu đồ
    var data = {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
            label: 'Tổng doanh thu',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2000000, 26000000],
            backgroundColor: [

                'rgba(54, 162, 235, 0.7)',

            ],
            borderColor: [

                'rgba(54, 162, 235, 1)',

            ],
            borderWidth: 1
        }]
    };

    // Cấu hình biểu đồ
    var options = {
        scales: {
            y: {
                beginAtZero: true,
                max: 30000000
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
@stop
<style>
    tr:hover {
        background-color: #ddd;
        cursor: pointer;
    }

    .table {
        border: 1px solid #CED4DA;
        border-collapse: collapse;
    }
</style>