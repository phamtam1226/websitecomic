@extends('admin.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">QUẢN LÝ CHAPTER</h3>
                    </div>
                    @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show notify" role="alert">
                        <strong>Thông báo! </strong>{{ Session::get('message') }}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="col-lg-12" style="padding-top:20px; display: flex; margin-bottom: 10px">
                        <div class="col-lg-6">
                            <form id="" method="GET" action="{{ route('admin.chapters.search') }}" style="float:right">
                                @csrf
                                <input style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:1.55rem" type="text" name="comic_name" placeholder="Nhập tên truyện">
                                <button id="btnsearch" class="btn-search" type="submit" style="padding: 0.5rem 1.5rem; border-radius: 10px;background:#a3a4a5c2"><i class='fas fa-search' style='font-size:15px'></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class="card-body">
                        <table id="book" class="table" broder="1">
                            <thead>
                                <tr>
                                    <th>Danh Sách Truyện</th>
                                    <th>Số Chapter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comics as $comic)
                                    <tr onclick="window.location=`{{ route('admin.chapters.showAll', $comic) }}`;">
                                        <td style="max-width: 180px; text-overflow: ellipsis; overflow: hidden">{{ $comic->comic_name }}</td>
                                        <td style="max-width: 20px; text-overflow: ellipsis; overflow: hidden">{{ $comic->number_chapters }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{$comics->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

@stop
