@extends('admin.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Thông tin bình luận</h3>
                    </div>
                    <div class="col-12" style="padding-top:10px;">
                        <ul class="breadcrumb" style="border: none">
                            <li><a href="{{ route('admin.comment.index') }}">Quản lý bình luận</a></li>
                            <li>/</li>
                            <li><a href="{{ route('admin.comment.showChapter', $comic) }}">{{ $comic->comic_name }}</a></li>
                            <li>/</li>
                            <li><a href="{{ route('admin.comment.show', ['comic' => $comic, 'chapter' => $chapter]) }}">{{ $chapter->chapter_name }}</a></li>
                            <li>/</li>
                            @foreach($commentuser as $comment)
                            <li>{{$comment->user->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show notify" role="alert">
                    <strong>Thông báo! </strong>{{ Session::get('success') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="col-12 "style="padding-top:50px">
            <div class="card-body">
              <table id="book" class="table" broder="1">
                <thead>
                  <tr>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th  style="width: 300px;">Nội dung</th>
                    <th>Tổng trả lời bình luận</th>
                    <th>Trạng thái</th>
                 
                  </tr>
                </thead>
                <tbody>
                  @foreach($commentuser as $comment)
                  <tr onclick="window.location=`{{ route('admin.comment.showcmtreply', ['comic' => $comic, 'chapter' => $chapter,'comment' => $comment]) }}`;">
                    <td>{{$comment->user->name}}</td>
                    <td>{{$comment->user->email}}</td>
                    
                    <td class="content">{{$comment->content}}</td>
                    <td>{{$comment->total_cmtreply}}</td>
                    <td>{{$comment->status}}</td>
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br>
              <hr style="border: solid 1px;">
              <br>
              <table id="book" class="table" broder="1">
                <thead>
                  <tr>
                    <th>Tên Tài Khoản</th>
                    <th>Email</th>
                    <th  style="width: 300px;">Nội Dung</th>
                    
                    <th>Trạng Thái</th>
                    <th>Tùy Chỉnh</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cmtreply as $cmtreply)
                  <tr onclick="window.location=`{{ route('admin.comment.showcmtreply', ['comic' => $comic, 'chapter' => $chapter,'comment' => $comment]) }}`;">
                    <td>{{$cmtreply->user->name}}</td>
                    <td>{{$cmtreply->user->email}}</td>
                    
                    <td class="content">{{$cmtreply->content_reply}}</td>
                   
                    <td>{{$cmtreply->status}}</td>
                    <td>
                      <form action="{{ route('admin.comment.destroyreply',['comic' => $comic, 'chapter' => $chapter,'comment' => $comment,'commentreply' => $cmtreply]) }}" method="POST">
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
<script>
  function ComfirmDelete() {
    var txt;
    if (confirm("Bạn có muốn xóa bình luận đã chọn?")) {
      return true;
    }
    return false;
  }
</script>
@stop
