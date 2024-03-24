@extends('admin.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Lịch Sử Hóa Đơn</h3>
                    </div>

                    <div class="col-12 col-xl-8 mb-4 mb-xl-0" style="padding-top:50px">
                        <!-- /.card-header -->
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                            <form id="" method="POST" action="{{ route('admin.food.search')}}" style="float:right">
                                @csrf
                                <input style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:1.55rem" type="text" name="namesearch" placeholder="Nhập tên nhân viên">
                                <button id="btnsearch" class="btn-search" type="submit" style="padding: 0.5rem 1.5rem; border-radius: 10px;background:#a3a4a5c2"><i class='fas fa-search' style='font-size:15px'></i></button>
                            </form>
                        </div>
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="card-body">
                                <table id="book" class="table" broder="1">
                                    <thead>
                                        <tr>
                                            <th>Mã Hóa Đơn</th>
                                            <th>Ngày Tạo</th>
                                            <th>Số Bàn</th>
                                            <th>Trạng Thái Hóa Đơn</th>
                                            <th>Tổng Tiền</th>
                                            <th>Tiền Giảm Giá</th>
                                            <th>Tổng Tiền Thanh Toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bill as $bill)
                                        <tr>
                                            <td><b>HD{{$bill->id}}</b></td>
                                            <td>{{$bill->created_at}}</td>
                                            <td>{{$bill->board_id}}</td>
                                            @if($bill->status == 0)
                                            <td>Đã thanh toán</td>
                                            @else
                                            <td>Chưa thanh toán</td>
                                            @endif
                                            <td>{{$bill->totalprice}} vnd</td>
                                            <td>0 vnd</td>
                                            <td>{{$bill->totalprice}} vnd</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

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