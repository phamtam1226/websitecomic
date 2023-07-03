@extends('admin.layout')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Chỉnh sửa chapter "{{ $chapter->chapter_name }}" của truyện "{{ $comic->comic_name }}"</h3>
                    </div>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show notify" role="alert">
                    <strong>Thông báo! </strong>{{ Session::get('message') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.chapters.update', ['comic' => $comic, 'chapter' => $chapter]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="chapter_name">Tên chapter</label>
                                    <input type="text" class="form-control" id="chapter_name" name="chapter_name" placeholder="Nhập tên chapter" value="{{ $chapter->chapter_name }}" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="status">Số xu</label>
                                    <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" class="form-control" id="coin" name="coin" placeholder="Status">
                                        @if($chapter->coin == 0)
                                        <option value="0">0 xu</option>
                                        <option value="300">300 xu</option>
                                        @else
                                        <option value="300">300 xu</option>
                                        <option value="0">0 xu</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="images">Hình ảnh</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật chapter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop