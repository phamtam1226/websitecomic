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
          <h3 class="font-weight-bold">THÊM TÀI KHOẢN</h3>
        </div>
        <div class="col-12" style="padding-top:10px;">
          <ul class="breadcrumb" style="border: none">
            <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li>/</li>
            <li><a href="{{route('admin.account.index')}}">Quản lý tài khoản</a></li>
            <li>/</li>
            <li>Thêm tài khoản</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <!-- form start -->
      <form action="{{ route('admin.account.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return CheckInput();">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <label for="exampleInputTitle">Họ Tên</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Họ Tên">
          </div>
          <div class="col-lg-6">
            <label for="exampleInputTopic">Email</label>
            <input class="form-control" type="text" name="email" id="email" placeholder="Email">
          </div>
          <div class="col-lg-6">
            <label for="exampleInputTitle">Mật Khẩu</label>
            <input class="form-control" type="text" name="password" id="password" placeholder="Mật Khẩu">
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <label for="exampleInputTitle">Loại Tài Khoản</label>
            <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" class="form-control" name="role" id="role" placeholder="Loại tài khoản">
              <option value="0">Admin</option>
              <option value="1">Thu ngân</option>
              <option value="2">Bếp</option>
              <option value="3" selected>Phục vụ</option>
            </select>
          </div>
          <div class="col-lg-6">
            <label for="exampleInputTitle">Trạng thái</label>
            <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" name="status" class="form-control" id="status" placeholder="Trạng thái">
              <option value="1">Đang hoạt động</option>
              <option value="0">Chưa kích hoạt</option>
            </select>
          </div>
        </div>

        <div class="row" style="float:right">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button> &nbsp;
          <a class="btn btn-secondary" href="{{route('admin.account.index')}}" style="margin-left: 15px;margin-right: 30px; color:white"><i class="fas fa-window-close"></i></a>
        </div>
      </form>
    </div>
  </div>
</div>
@stop