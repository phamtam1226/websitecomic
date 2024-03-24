@extends('user.layout')
@section('content')


<div id="content-wrapper" class="ng-scope">


    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show notify" role="alert">
        <strong>Thông báo! </strong>{{Session::get('message')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    <div class="row" id="content-header">
        <h1>Order </h1>
        <div class="row">
            <div class="col-sm-9">
                <h3> Danh sách món ăn</h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên món</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($food as $food)

                        <tr>
                            <td><img src="{{ Storage::url($food->food_img) }}" alt="{{ $food->food_name }}" style=" width: 80px;"></td>
                            <td>{{$food->food_name}}</td>
                            <td>{{$food->food_price}}</td>


                            <td>
                                <form method="POST">
                                    {{csrf_field()}}
                                    <button type="button" class="btn btn-warning addorder" style="padding: 0.5rem 1.5rem; border-radius: 10px;" id="addorder" onclick="AddOrder(' {{$food->id}}')">
                                        <i class='fas fa-plus' style='font-size:15px'></i>
                                    </button>
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="food_id" hidden class="form-control" id="food_id" value="{{$food->id}}">
                                        <div id="comment_show"></div>
                                    </form>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                    @endforeach
                </table>

            </div>
            <div class=" col-sm-3">
                <h3> Bàn số</h3>
            </div>

        </div>

    </div>

</div>
@stop