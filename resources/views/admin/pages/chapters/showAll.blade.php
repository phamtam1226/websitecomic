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
                            <li><a href="{{ route('admin.chapters.index') }}">Quản lý chapter</a></li>
                            <li>/</li>
                            <li><a href="{{ route('admin.chapters.showAll', $comic) }}">{{ $comic->comic_name }}</a></li>
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
                        <a class="btn btn-primary" href="{{ route('admin.chapters.create', $comic) }}" style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:40px"><i class='fas fa-plus' style='font-size:15px'></i></a>
                        <!-- /.card-header -->
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="card-body">
                                <table id="book" class="table" broder="1">
                                    <thead>
                                        <tr>
                                            <th>Tên chương</th>
                                            <th>Tùy Chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chapters as $chapter)
                                        <tr onclick="window.location='{{ route('admin.chapters.show', ['comic' => $comic, 'chapter' => $chapter]) }}';">
                                            <td>{{ $chapter->chapter_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.chapters.edit', ['comic' => $comic, 'chapter' => $chapter]) }}" class="btn btn-warning" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-edit' style='font-size:15px'></i></a>
                                                <form action="{{ route('admin.chapters.destroy', ['comic' => $comic, 'chapter' => $chapter]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return ConfirmDelete();" class="btn btn-danger" style="margin-top:10px; padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-trash-alt' style='font-size:15px'></i></button>
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