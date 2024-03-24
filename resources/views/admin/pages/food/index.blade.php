@extends('admin.layout')
@section('content')
<!-- partial -->
<style>
    .decimal-dot {
        font-size: 24px;
        /* Kích thước chữ */
        color: red;
        /* Màu chữ */
        margin-left: 5px;
        /* Khoảng cách với phần tử bên phải */
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">QUẢN LÝ THỰC ĐƠN</h3>
                    </div>

                    <div class="col-lg-12" style="padding-top:20px; display: flex; margin-bottom: 10px">
                        <div class="col-lg-6">
                            <a class="btn btn-primary" href="{{ route('admin.food.create')}}" style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:40px"><i class='fas fa-plus' style='font-size:15px'></i></a>
                        </div>
                        <div class="col-lg-6">
                            <form id="" method="POST" action="{{ route('admin.food.search')}}" style="float:right">
                                @csrf
                                <input style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:1.55rem" type="text" name="namesearch" placeholder="Nhập tên món ăn">
                                <button id="btnsearch" class="btn-search" type="submit" style="padding: 0.5rem 1.5rem; border-radius: 10px;background:#a3a4a5c2"><i class='fas fa-search' style='font-size:15px'></i></button>
                            </form>
                        </div>
                    </div>
                    <br>

                    <br>
                    <div class="col-lg-12" style="padding-top:20px; display: flex; margin-bottom: 10px">

                        <?php $check = 0 ?>
                        @if($check == 0)
                        <a type="button" class="btn btn-primary checktype" id="1" onclick="return CheckType(1);" style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:40px">Món ăn</a>
                        <a class="btn btn-primary checktype" id="2" onclick="return CheckType(2);" style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:40px">Nước uống</a>
                        <?php $check = 1 ?>
                    </div>
                    <div id="food_show"></div>
                    @endif



                    <!-- /.card-header -->
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <div class="card-body">
                            <table id="book" class="table" broder="1">
                                <thead>
                                    <tr>
                                        <th>MSP</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Món</th>
                                        <th>Giá</th>
                                        <th>Trạng Thái</th>
                                        <th>Loại</th>
                                        <th>Tùy Chỉnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($food as $food)
                                    <tr>
                                        <td><b>M{{$food->id}}</b></td>
                                        <td><img src="{{ Storage::url($food->food_img) }}" alt="{{ $food->food_name }}" style="width:50px; height:50px; border-radius:0%"></td>
                                        <td>{{$food->food_name}}</td>
                                        <td>{{$food->food_price}}đ</td>
                                        @if($food->status == 1)
                                        <td>Còn hàng</td>
                                        @else
                                        <td>Hết hàng</td>
                                        @endif
                                        @if($food->type == 1)
                                        <td>Đồ ăn</td>
                                        @else
                                        <td>Nước uống</td>
                                        @endif



                                        <td>
                                            <a href="{{ route('admin.food.edit', $food) }}" class="btn btn-warning" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-edit' style='font-size:15px'></i></a>
                                            <form action="{{ route('admin.food.destroy', $food) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return ComfirmDelete();" class="btn btn-danger" style="margin-top:10px; padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-trash-alt' style='font-size:15px'></i></button>
                                            </form>

                                        </td>
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
<script>
    function ComfirmDelete() {
        var txt;
        if (confirm("Bạn có muốn xóa món ăn/nước uống đã chọn?")) {
            return true;
        }
        return false;
    }
</script>
<script>
    function CheckType(id) {
        $.ajax({
            url: "{{route('admin.food.checktype')}}",
            method: 'POST',
            data: {
                "_token": '{{csrf_token()}}',
                "type": id,

            },
            success: function(data) {

                $('#food_show').html(data);
            }

        });

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