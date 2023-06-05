@extends('admin.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">QUẢN LÝ TÀI KHOẢN</h3>
          </div>
          @if(Session::has('message'))
          <div class="alert alert-success alert-dismissible fade show notify" role="alert">
            <strong>Thông báo! </strong>{{Session::get('message')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          <div class="col-lg-12" style="padding-top:20px; display: flex; margin-bottom: 10px">
            <div class="col-lg-6">
              <a class="btn btn-primary" href="{{ route('admin.account.create')}}" style="padding: 0.7rem 1.5rem; border-radius: 10px; margin-left:10px;"><i class='fas fa-plus' style='font-size:15px'></i></a>
            </div>
            <div class="col-lg-6">
              <form id="" method="POST" action="{{ route('admin.account.search')}}" style="float:right">
                @csrf
                <input style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:1.55rem" type="text" name="namesearch" placeholder="Nhập họ tên hoặc email">
                <button id="btnsearch" class="btn-search" type="submit" style="padding: 0.5rem 1.5rem; border-radius: 10px;background:#a3a4a5c2"><i class='fas fa-search' style='font-size:15px'></i></button>
              </form>
            </div>
          </div> <!-- /.card-header -->
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <div class="card-body">
              <table id="book" class="table" broder="1">
                <thead>
                  <tr>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Ảnh Đại Diện</th>
                    <th>Loại Tài Khoản</th>
                    <th>Trạng thái</th>
                    <th>Tùy Chỉnh</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($account as $accounts)
                  <tr>
                    <td>{{$accounts->name}}</td>
                    <td>{{$accounts->email}}</td>
                  
                    <td><img src="{{ Storage::url($accounts->avatar) }}" style="width:50px; height:50px; border-radius:0%"></td>
                    <td>@if($accounts->role == 1) {{"Admin"}}
                      @else {{"Khách Hàng"}}
                      @endif</td>

                    @if($accounts->status == 1)
                    <td style="text-align:center"><input type="checkbox" disabled="disabled" checked /></td>
                    @else
                    <td style="text-align:center"><input type="checkbox" disabled="disabled" /></td>
                    @endif
                    <td>
                      <a href="{{ route('admin.account.edit', $accounts)}}" class="btn btn-warning" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-edit' style='font-size:15px'></i></a>
                      <form action="{{ route('admin.account.destroy', $accounts) }}" method="POST">
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
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  function ComfirmDelete() {
    var txt;
    if (confirm("Bạn có muốn xóa tài khoản đã chọn?")) {
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