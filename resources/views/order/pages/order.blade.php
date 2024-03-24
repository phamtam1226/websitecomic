@extends('order.layout')
@section('content')


<div id="content-wrapper" class="ng-scope">
    @if(session()->has('infoUser'))


    <i class="fa-solid fa-circle-xmark"></i>
    <div class="row" id="content-header">

        <h1> <a href="{{route('order.index')}}"><i class="fas fa-arrow-left"></i></a> Order </h1>
        <div class="row">
            <div class="col-sm-8">
                <h3> Danh sách món ăn</h3>
                <form id="" method="POST" action="{{ route('order.search')}}" style="text-align: center;">
                    @csrf
                    <input type="hidden" name="board_id" hidden class="form-control" id="board_id" value="{{$board->id}}">
                    <input style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:1.55rem; margin-bottom:1.55rem; width:300px" type="text" name="namesearch" placeholder="Nhập tên món ăn">
                    <button id="btnsearch" class="btn-search" type="submit" style="padding: 0.5rem 1.5rem; border-radius: 10px;background:#a3a4a5c2"><i class='fas fa-search' style='font-size:15px'></i></button>

                </form>
                <!-- <li style="padding: 5px 0 0 15px;">
                    <form id="form-search" action="{{ route('order.comics_search_keyword') }}" method="GET">
                        <div class="search-container">
                            <input type="text" class="input-search" name="keyword" id="keywords" autocomplete="off" placeholder="Tìm truyện ..." value="{{ request()->input('keyword') }}">
                            <button style="border-radius: 0.25rem; padding: 0.25rem 0.5rem; background-color: rgb(104, 101, 92); color: cornsilk;" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            <div class="search-results">
                                <ul class="list-unstyled" id="search-results">
                                </ul>
                            </div>
                        </div>
                    </form>
                </li>
                <div id="search_ajax"></div> -->
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col" style="width:10%">Hình ảnh</th>
                            <th scope=" col" style="width: 35%;text-align:center;">Tên món</th>
                            <th scope="col" style="text-align:center;">Giá</th>
                            <th scope="col" style="text-align:center;">Số lượng</th>
                            <th scope="col" style="text-align:center;">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($food as $food)

                        <tr>
                            <td><img src=" {{ Storage::url($food->food_img) }}" alt="{{ $food->food_name }}" style="width:80px; ">
                            </td>
                            <td>
                                <h4>{{$food->food_name}}</h4><b><a onclick="note('{{$food->id}}')" id="{{ $food->id }}"> <i class='fas fa-pen '></i></a> Ghi chú:</b>
                                <br>
                                <textarea style=" display:none;" class="formnote formnote{{$food->id}}" id="note{{$food->id}}" name="note{{$food->id}}" rows="3" cols="50">
                                            </textarea>
                            </td>

                            <td style="text-align:center;">{{$food->food_price}}đ</td>

                            <td style="text-align:center;"><input type="number" id="inputquantity" min="0" max="100" step="1" value="1">

                            </td>

                            <td style="text-align:center;">
                                <form method=" POST">
                                    {{csrf_field()}}
                                    @if($food->status == 1)
                                    <a href="" class="btn btn-warning" style="padding: 0.5rem 1.5rem; border-radius: 10px;" id="addorder" onclick="AddOrder('{{$food->id}}')">
                                        <i class='fas fa-plus' style='font-size:15px'></i>
                                    </a>
                                    @else
                                    <a href="" class="btn btn-danger" style="padding: 0.5rem 1.5rem; border-radius: 10px;" id="addorder">
                                        Hết
                                    </a>
                                    @endif
                                    <form method="POST">
                                        @csrf
                                        <?php $infoUser = session()->get('infoUser') ?>
                                        <input type="hidden" name="user_id" hidden class="form-control" id="user_id" value="{{$infoUser['id']}}">
                                        <input type="hidden" name="board_id" hidden class="form-control" id="board_id" value="{{$board->id}}">

                                    </form>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                    @endforeach
                </table>

            </div>

            <div class=" col-sm-4">
                <h2 style="text-align: center"><b>Bàn số {{$board->board_number}}</b></h2>
                <br>
                @if(Session::has('message_order'))
                <div class="alert alert-success alert-dismissible fade show notify" role="alert">
                    <strong>Thông báo! </strong>{{Session::get('message_order')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>

                @endif
                <form action="" method=" POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên món</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($bill != null)
                            <tr>

                                <input type="hidden" name="bill_id" hidden class="form-control" id="bill_id" value="{{$bill->id}}">
                                @foreach($billorder as $billorder)
                                <td>{{$billorder->food->food_name}}<br>(Ghi chú: {{$billorder->note}})</td>
                                <td>{{$billorder->quantity}}</td>
                                <td> {{$billorder->food->food_price}}đ</td>
                                <td><a href="" onclick="deletefood('{{$billorder->id}}')" style="color: red;">Huỷ</a></td>

                            </tr>

                            @endforeach

                            @endif
                            @foreach($order as $order)

                            <td>
                                <span style="color: red;"><b>Thêm mới</b></span><br>{{$order->food->food_name}}<br>(Ghi chú: {{$order->note}})</b>
                            </td>
                            <td><br>{{$order->quantity}}</td>
                            <td><br>{{$order->food->food_price}}đ</td>
                            <td style="text-align: center; color:red;"><br><a href="" onclick="deleteorder('{{$order->id}}')" style=" color:red;"><i class='fas fa-trash'></i></a></td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                    <br>
                    @if($bill != null)

                    <h3 style="float: right;color:red;"><b style="color:black">TỔNG TIỀN: </b>{{$bill->totalprice}}đ</h3>
                    <br>
                    @else
                    <h3 style="float: right;color:red;"><b style="color:black">TỔNG TIỀN: </b>{{$totalorder}}đ</h3>

                    @endif

                    <input type="hidden" name="board_id" hidden class="form-control" id="board_id" value="{{$board->id}}">
                    @if($bill != null)

                    <div class="btn-group" style=" width: -webkit-fill-available;">
                        <!-- <button type="submit" class="btn btn-success" onclick="AddBill('{{$board->id}}')">Hủy</button> -->
                        <button type="submit" class="btn " onclick="AddBill('{{$board->id}}')" style="background-color: #cdae1f;font-size: medium;color: white;">Cập nhật</button>
                        <button type="submit" class="btn " onclick="RequestPay('{{$bill->id}}')" style="background-color: #47c427;font-size: medium;color: white;">Yêu cầu thanh toán</button>
                    </div>
                    @else
                    <BR>
                    <div class="row" style="float:right;display: contents; ">
                        <button type="submit" class="btn btn-success" onclick="AddBill('{{$board->id}}')">LẬP ĐƠN</button> &nbsp;
                    </div>
                    @endif
                </form>
            </div>

        </div>

    </div>
    @endif
</div>
@stop