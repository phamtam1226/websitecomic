@extends('admin.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{ $comic->comic_name }}</h3>
                    </div>
                    <div class="col-12" style="padding-top:10px;">
                        <ul class="breadcrumb" style="border: none">
                            <li><a href="{{ route('admin.comment.index') }}">Quản lý bình luận </a></li>
                            <li>/</li>
                            <li>{{ $comic->comic_name }}</li>
                        </ul>
                    </div>
                    @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show notify" role="alert">
                        <strong>Thông báo! </strong>{{Session::get('message')}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0" style="padding-top:50px">
                       
                        <!-- /.card-header -->
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="card-body">
                                <table id="book" class="table" broder="1">
                                    <thead>
                                        <tr>
                                            <th>Tên Chương</th>
                                            <th>Tổng Bình Luận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chapters as $chapter)
                                        <tr onclick="window.location=`{{ route('admin.comment.show', ['comic' => $comic, 'chapter' => $chapter]) }}`;">
                                            <td>{{ $chapter->chapter_name }}</td>
                                            <td>{{ $chapter->number_comment }}</td>
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
        if (confirm("Bạn có muốn xóa thể loại đã chọn?")) {
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