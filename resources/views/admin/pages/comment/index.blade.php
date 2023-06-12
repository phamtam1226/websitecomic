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
            
            <!-- <div class="col-lg-6">
              <form id="" method="POST" action="" style="float:right">
                @csrf
                <input style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:1.55rem" type="text" name="namesearch" placeholder="Nhập họ tên hoặc email">
                <button id="btnsearch" class="btn-search" type="submit" style="padding: 0.5rem 1.5rem; border-radius: 10px;background:#a3a4a5c2"><i class='fas fa-search' style='font-size:15px'></i></button>
              </form>
            </div> -->
          </div> <!-- /.card-header -->
          <div class="col-12 "style="padding-top:50px">
            <div class="card-body">
              <table id="book" class="table" broder="1">
                <thead>
                  <tr>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Tên truyện</th>
                    <th>Tên chương</th>
                    <th  style="width: 300px;">Nội dung</th>
                    <th>Trạng thái</th>
                    <th>Tùy Chỉnh</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($comment as $comment)
                  <tr>
                    <td>{{$comment->user->name}}</td>
                    <td>{{$comment->user->email}}</td>
                    <td>{{$comment->comic->comic_name}}</td>
                    <td>{{$comment->chapter->chapter_name}}</td>
                    <td class="content">{{$comment->content}}</td>
                    <td>{{$comment->status}}</td>
                    <td>
                      <form action="{{ route('admin.comment.destroy', $comment) }}" method="POST">
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