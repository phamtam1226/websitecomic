@extends('admin.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Thông tin chapter</h3>
                    </div>
                    <div class="col-12" style="padding-top:10px;">
                        <ul class="breadcrumb" style="border: none">
                            <li><a href="{{ route('admin.chapters.index') }}">Quản lý chapter</a></li>
                            <li>/</li>
                            <li><a href="{{ route('admin.chapters.showAll', $comic) }}">{{ $comic->comic_name }}</a></li>
                            <li>/</li>
                            <li><a href="{{ route('admin.chapters.show', ['comic' => $comic, 'chapter' => $chapter]) }}">{{ $chapter->chapter_name }}</a></li>
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
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class="card-body">
                        <h4>Tên truyện: {{ $comic->comic_name }}</h4>
                        <h5>Tên chapter: {{ $chapter->chapter_name }}</h5>
                        <h5>Hình ảnh:</h5>
                        @foreach ($chapter->images as $image)
                            <img src="{{ Storage::url($image->image_path) }}" alt="Chapter Image" style="max-width: 500px; margin-bottom: 10px;">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
