@extends('admin.layout')
@section('content')
<style>
    .row {
        padding-top: 20px !important;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12" style="margin-left: 80px; padding-right:70px">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Sửa TRUYỆN</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li>/</li>
                        <li><a href="{{ route('admin.comics.index') }}">Quản lý truyện</a></li>
                        <li>/</li>
                        <li>Sửa truyện</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- form start -->
            <form action="{{ route('admin.comics.update', $comic) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6">
                        <label for="comic-cover-image">Ảnh bìa</label>
                        <div class="custom-file">
                        <img id="comic-cover-image" src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}">
                            <input accept="*.png|*.jpg|*.jpeg" type="file" class="form-control" id="cover_image" name="cover_image" value="{{ Storage::url($comic->cover_image) }}" placeholder="Chọn ảnh" onchange="updateImagePreview(this)" />
                        </div>

                        <label for="comic_name" style="margin-top: 15px;">Tên Truyện</label>
                        <input class="form-control" type="text" value="{{ $comic->comic_name }}" id="comic_name" name="comic_name" placeholder="Tên truyện">

                        <label for="status">Trạng Thái</label>
                        <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" class="form-control" id="status" name="status" value="{{ $comic->status }}">
                            <option value="0">Đang tiến hành</option>
                            <option value="1">Đã hoàn thành</option>
                        </select>

                        <label for="description">Mô Tả</label>
                        <textarea type="text" style="height:100px" class="form-control" id="description" name="description">{{ $comic->description }}</textarea>
                    </div>

                    <div class="col-lg-6">
                        <label for="genre_id">Thể loại</label><br>
                        <div class="row">
                            @php $half = ceil($genres->count() / 2); @endphp
                            @foreach ($genres as $index => $genre)
                                @if ($index == 0 || $index == $half)
                                    <div class="col-md-6">
                                @endif
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="genre_ids[]" id="genre_{{ $genre->id }}" value="{{ $genre->id }}" {{ in_array($genre->id, $selectedGenres) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="genre_{{ $genre->id }}">{{ $genre->name }}</label>
                                        </div>
                                @if ($index == $half-1 || $index == $genres->count()-1)
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row" style="float:right">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button> &nbsp;
                    <a class="btn btn-secondary" href="{{ route('admin.comics.index') }}" style="margin-left: 15px;margin-right: 30px; color:white"><i class="fas fa-window-close"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop