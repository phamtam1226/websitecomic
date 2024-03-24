@extends('admin.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">QUẢN LÝ BÀN ĂN</h3>
                    </div>

                    <div class="col-12  mb-4 mb-xl-0" style="padding-top:50px">
                        <a class="btn btn-primary" href="{{ route('admin.board.create')}}" style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:40px"><i class='fas fa-plus' style='font-size:15px'></i></a>
                        <!-- /.card-header -->
                        <div class="row">
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-2">
                                <h5><span style="background-color: #828fca;">&ensp;&ensp;</span>
                                    <span>
                                        &ensp;Trống
                                    </span>
                                    <h5>
                            </div>
                            <div class="col-sm-2">
                                <h5><span style="background-color: yellow;">&ensp;&ensp;</span>
                                    <span>
                                        &ensp; Đang đợi món
                                    </span>
                                    <h5>
                            </div>
                            <div class="col-sm-2">
                                <h5><span style="background-color: #ffc107;">&ensp;&ensp;</span>
                                    <span>
                                        &ensp; Chờ thanh toán
                                    </span>
                                    <h5>
                            </div>
                            <div class="col-sm-2">
                                <h5><span style="background-color: #45ca45;">&ensp;&ensp;</span>
                                    <span>
                                        &ensp; Đang thanh toán
                                    </span>
                                    <h5>
                            </div>
                            <div class="col-sm-2">

                            </div>

                        </div>
                        <div class="col-12 mb-4 mb-xl-0">
                            <div class="row">
                                @foreach($board as $board)
                                <div class="col-3">
                                    <div class="card-body board text-center">
                                        <button type="button" style="background-color: #828fca;color:white;">Bàn {{$board->board_number}}</button>
                                    </div>
                                    <form action="{{ route('admin.board.destroy', $board) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return ComfirmDelete();" class="btn btn-danger" style="margin-top:10px; padding: 0.5rem 1.5rem; border-radius: 10px;margin-left: 94px;"><i class='fas fa-trash-alt' style='font-size:15px'></i></button>
                                    </form>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function ComfirmDelete() {
        var txt;
        if (confirm("Bạn có muốn xóa bàn ăn đã chọn?")) {
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