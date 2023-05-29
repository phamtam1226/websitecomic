<!DOCTYPE html>
<html lang="en">
<head>
    <title>Danh sách truyện</title>
    <style>
        body {
            background-color: #333;
        }
        .main-container {
            width: 66.66%;
            margin: 0 auto;
            background-color: #fff;
        }
        .comic-container {
            display: grid;
            grid-template-columns: repeat(4, 23%);
            grid-gap: 20px;
        }
        .comic {
            border: none;
            padding: 10px;
        }
        .comic img {
            width: 100%;
            height: 250px;
            cursor: pointer;
        }
        .comic h2 {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <h1>Danh sách truyện tranh</h1>
        <div>
            <a href="{{ route('admin.comics.create') }}">Thêm truyện mới</a>
        </div>
        <div class="comic-container">
            @foreach ($comics as $comic)
                <div class="comic">
                    <img src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}" onclick="window.location.href=`{{ route('admin.comics.show', $comic) }}`;">
                    <h2 onclick="window.location.href=`{{ route('admin.comics.show', $comic) }}`;">{{ $comic->comic_name }}</h2>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
