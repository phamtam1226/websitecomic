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
          <h3 class="font-weight-bold">THÊM THỂ LOẠI</h3>
        </div>
        <div class="col-12" style="padding-top:10px;">
          <ul class="breadcrumb" style="border: none">
            <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li>/</li>
            <li><a href="{{ route('admin.employee.index') }}">Quản lý nhân viên</a></li>
            <li>/</li>
            <li>Thêm nhân viên</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <!-- form start -->
      <form action="{{ route('admin.employee.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <label for="exampleInputTitle">Họ Và Tên</label>
            <input class="form-control" type="text" name="user_name" id="user_name" placeholder="Họ và Tên">
          </div>
          <div class="col-lg-6">
            <label for="exampleInputTitle">Số điện thoại</label>
            <input class="form-control" type="text" name="user_phone" id="user_phone" placeholder="Số điện thoại">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <label for="exampleInputTopic">Giới tính</label>
            <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="user_gender" class="form-control" id="status" placeholder="Giới tính">
              <option value="0">Nam</option>
              <option value="1">Nữ</option>
            </select>
          </div>
          <div class="col-lg-6">
            <label for="exampleInputTopic">CCCD</label>
            <input class="form-control" type="text" name="user_cccd" id="user_cccd" placeholder="Cccd">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <label for="exampleInputTitle">Email</label>
            <input class="form-control" type="text" name="user_email" id="user_email" placeholder="Email">
          </div>
          <div class="col-lg-6">
            <label for="exampleInputTitle">Địa Chỉ</label>
            <input class="form-control" type="text" name="user_address" id="user_address" placeholder="Địa chỉ">
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <label for="exampleInputTopic">Ngày Sinh</label>
            <input class="form-control" type="date" name="user_birthday" id="user_birthday">
          </div>
          <div class="col-lg-6">
            <label for="exampleInputTopic">Ngày Bắt Đầu Làm Việc</label>
            <input class="form-control" type="date" name="user_datestart" id="user_datestart">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <label for="exampleInputTopic">Chức vụ</label>

            <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" class="form-control" name="user_position" id="user_position">
              <option value="0">Admin</option>
              <option value="1">Thu ngân</option>
              <option value="2">Bếp</option>
              <option value="3" selected>Phục vụ</option>
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