@extends('cashier.layout')
@section('content')

<div>
    <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>
</div>
<div style="text-align:center;">
    <h4 class="modal-title">Quán Ăn PBT</h4>

    <h6><i class="fas fa-location-dot"></i>Đường 3/2 - Cần Thơ</h6>

    <h6>0876935155</h6> <br>

</div>
<hr>

<!-- Modal body -->
<div class="modal-body" style="text-align:center;" ;>
    <h5>HÓA ĐƠN THANH TOÁN</h5>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <p> Số HD: </p>
            <p>Ngày: </p>
        </div>
        <div class="col-sm-6">
            <p>Bàn: </p>
            <p>Nhân viên: </p>
        </div>
    </div>
    <table class="table-borderless ">
        <thead>
            <tr>
                <th scope="col">Tên món</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Tổng tiền</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>q</td>
                <td>q</td>
                <td>q</td>
                <td>q</td>
            </tr>
        </tbody>

    </table>

    <div class="row">
        <div class="col-sm-4">
            <p><b> TỔNG CỘNG </b></p>

        </div>
        <div class="col-sm-4">
            <p><b>5</b> </p>

        </div>
        <div class="col-sm-4">
            <p><b>5</b> </p>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p> GIẢM GIÁ </p>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <p><b>5</b> </p>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p> <b>TỔNG THANH TOÁN</b></p>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <p><b>5</b> </p>

        </div>
    </div>
    <h5>CẢM ƠN QUÝ KHÁCH HẸN GẶP LẠI!!!</h5>
</div>



</div>
@stop