@extends('admin.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">QUẢN LÝ THỂ LOẠI</h3>
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
                        <a class="btn btn-primary" href="{{ route('admin.genres.create') }}" style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:40px"><i class='fas fa-plus' style='font-size:15px'></i></a>
                        <!-- /.card-header -->
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="card-body">
                                <table id="book" class="table" broder="1">
                                    <thead>
                                        <tr>
                                            <th>Tên Thể Loại</th>
                                            <th>Tùy Chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($genres as $genre)
                                        <tr>

                                            <td>{{ $genre->name }}</td>

                                            <td>
                                                <a href="{{ route('admin.genres.edit', $genre) }}" class="btn btn-warning" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-edit' style='font-size:15px'></i></a>
                                                <form action="{{ route('admin.genres.destroy', $genre) }}" method="POST">
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
                       {{$genres->links()}}
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