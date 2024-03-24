@extends('admin.layout')
@section('content')
<style>
    .row {
        padding-top: 20px !important;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12" style="margin-left: 80px; padding-right:70px">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Sửa Thực đơn</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li>/</li>
                        <li><a href="{{ route('admin.employee.index') }}">Quản lý thực đơn</a></li>
                        <li>/</li>
                        <li>Sửa thể loại</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- form start -->
            <form action="{{ route('admin.food.update',$food)}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6">
                        <label for="exampleInputTitle">Hình ảnh</label>
                        <div class="custom-file">
                            <img id="comic-cover-image" src="{{ Storage::url($food->food_img) }}" alt="{{ $food->food_img }}" style=" width:100px">
                            <input accept="*.png|*.jpg|*.jpeg" type="file" class="form-control" id="cover_image" name="cover_image" value="{{ Storage::url($food->food_img) }}" placeholder="Chọn ảnh" onchange="updateImagePreview(this)" />
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="exampleInputTitle">Tên món ăn</label>
                        <input class="form-control" type="text" name="food_name" id="food_name" placeholder="Tên món ăn" value="{{$food->food_name}}">
                    </div>

                    <div class="col-lg-6">
                        <label for="exampleInputTitle">Giá</label>
                        <input class="form-control" type="text" name="food_price" id="food_price" placeholder="Giá" value="{{$food->food_price}}">
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="exampleInputTitle">Trạng thái</label>
                        <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" class="form-control" name="status" id="status">
                            @if($food->status == 1)
                            <option value="1" selected>Còn hàng</option>
                            <option value="0">Hết hàng</option>
                            @else
                            <option value="1">Còn hàng</option>
                            <option value="0" selected>Hết hàng</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="exampleInputTitle">Loại</label>
                        <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" class="form-control" name="gener" id="gener">
                            @if($food->gener == 1)
                            <option value="1" selected>Đồ ăn</option>
                            <option value="2">Nước uống</option>
                            @else
                            <option value="1">Đồ ăn</option>
                            <option value="2" selected>Nước uống</option>
                            @endif
                        </select>
                    </div>

                </div>
                <div class="row" style="float:right">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button> &nbsp;
                    <a class="btn btn-secondary" href="" style="margin-left: 15px;margin-right: 30px; color:white"><i class="fas fa-window-close"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop