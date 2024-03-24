<h3> Bàn số {{$board->board_number}}</h3>
<form action="" method=" POST" enctype="multipart/form-data">
    @csrf
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tên món</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <!-- <th scope="col">Tùy chỉnh</th> -->
            </tr>
        </thead>
        <tbody>
            @if($bill != null)
            <tr>

                <input type="hidden" name="bill_id" hidden class="form-control" id="bill_id" value="{{$bill->id}}">
                @foreach($billorder as $billorder)
                <td>{{$billorder->food->food_name}}<br><b>Ghi chú:</b> {{$billorder->note}}</td>
                <td>{{$billorder->quantity}}</td>
                <td>{{$billorder->food->food_price}}</td>
                <!-- <td><a href="" onclick="deletefood('{{$billorder->id}}')" style="color: red;">Huỷ</a></td> -->

            </tr>

            @endforeach
            @endif
            @foreach($order as $order)
            <td>{{$order->food->food_name}} {thêm mới)<br><b>Ghi chú: {{$order->note}}</b></td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->food->food_price}}</td>
            <td><a href="" onclick="deleteorder('{{$order->id}}')">Xóa</a></td>
            </tr>

            @endforeach

        </tbody>

    </table>
    @if($bill != null)

    <h3 style="float: right;color:red;"><b style="color:black">TỔNG TIỀN: </b>{{$bill->totalprice}}đ</h3>
    <br>
    @else
    <h3>Tổng: 0 vnd</h3>
    @endif

    <input type="hidden" name="board_id" hidden class="form-control" id="board_id" value="{{$board->id}}">
    @if($bill != null)
    <br>
    <div class="btn-group" style=" float:right">
        <!-- <button type="submit" class="btn btn-success" onclick="AddBill('{{$board->id}}')">Hủy</button> -->

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
            Xác Nhận Thanh Toán
        </button>
    </div>
    @else
    <div class="row" style="float:right">

    </div>
    @endif


    <!-- The Modal -->
    <div class="modal  center" id="myModal">
        <div class="modal-dialog ">
            <div class="modal-content" style="width: 500px;">

                <!-- Modal Header -->
                <div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right;"></button>
                </div>
                <div style="text-align:center;">
                    <h1 class="modal-title">Quán Ăn PBT</h1>

                    <h6><i class="fas fa-map-marker-alt"></i> Đường 3/2 - Cần Thơ</h6>

                    <h6><i class="fas fa-phone"></i> 876935155</h6> <br>

                </div>
                <hr>

                <!-- Modal body -->
                <div class="modal-body" style="text-align:center;" ;>

                    <h3>HÓA ĐƠN THANH TOÁN</h3>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <p> Số HD: HD{{$bill->id}} </p>
                            <p><i class="fas fa-calendar-alt"></i>{{$bill->created_at}} </p>
                        </div>
                        <div class="col-sm-6">
                            <p>Bàn: {{$bill->board_id}}</p>
                            <p>Nhân viên: Phạm Bá Tam </p>
                        </div>
                    </div>
                    <table class="table-borderless ">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;">Tên món</th>
                                <th scope="col" style="text-align: center;">Số lượng</th>
                                <th scope="col" style="text-align: center;">Giá</th>
                                <th scope="col" style="text-align: center;">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inbill as $inbill)
                            <tr>
                                <td>{{$inbill->food->food_name}}</td>
                                <td style="text-align: center;">{{$inbill->quantity}}</td>
                                <td style="text-align: center;">{{$inbill->food->food_price}}đ</td>
                                <td style="text-align: center;">89.000đ</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b> TỔNG CỘNG </b></p>

                        </div>
                        <div class="col-sm-4">
                            <p><b>3</b> </p>

                        </div>
                        <div class="col-sm-4">
                            <p><b>227.000đ</b> </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <p> GIẢM GIÁ </p>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <p><b>0đ</b> </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <p> <b>TỔNG THANH TOÁN</b></p>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <p><b>372.000đ</b> </p>

                        </div>
                    </div>
                    <br>
                    <br>
                    <h1 style="font-family: ui-sans-serif;">CẢM ƠN QUÝ KHÁCH HẸN GẶP LẠI!!!</h1>
                    <br>
                    <br>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="{{ route('cashier.inbill', ['id' => $bill->id]) }}"> <button type="button" class="btn btn-success" data-bs-dismiss="modal">IN HÓA ĐƠN</button></a>

                </div>

            </div>
        </div>
    </div>
</form>