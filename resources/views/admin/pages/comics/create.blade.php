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
                    <h3 class="font-weight-bold">THÊM TRUYỆN</h3>
                </div>
                <div class="col-12" style="padding-top:10px;">
                    <ul class="breadcrumb" style="border: none">
                        <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li>/</li>
                        <li><a href="{{ route('admin.comics.index') }}">Quản lý truyện</a></li>
                        <li>/</li>
                        <li>Thêm truyện</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- form start -->
            <form action="{{ route('admin.comics.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                   
                    <div class="col-lg-6">
                        <label for="comic-cover-image">Ảnh bìa</label>
                        <div class="custom-file">
                        <img id="comic-cover-image" src="" alt="Comic Cover Image" style="display: none;">
                            <input accept="*.png|*.jpg|*.jpeg" type="file" class="form-control" id="cover_image" name="cover_image" placeholder="Chọn ảnh" onchange="updateImagePreview(this)" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="comic_name">Tên Truyện</label>
                        <input class="form-control" type="text" id="comic_name" name="comic_name" placeholder="Tên truyện">
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="genre_id">Thể loại</label>
                        <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" id="genre_id" name="genre_id" class="form-control" placeholder="Title">
                            @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6" style=" margin-left:-12px">
                        <label for="status">Trạng Thái</label>
                        <select style="border: 1px solid #CED4DA;border-radius: 4px; outline: none;" class="form-control" id="status" name="status" placeholder="Status">
                            <option value="2">new</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="description">Mô Tả</label>
                        <textarea type="text" style="height:100px" class="form-control" id="description" name="description" placeholder="Nhập nội dung mô tả"></textarea>
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