<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $chapter->comic->comic_name }} {{ $chapter->chapter_name }}</title>
    <style>
       .images-container {
            width: 100%;
            text-align: center;
        }
        .images-container img {
            width: 100%;
            max-width: 800px;
            height: auto;
            display: block;
            margin: 15px auto;
        }
    </style>
</head>
<body>
    <h1>{{ $chapter->comic->comic_name }} - {{ $chapter->chapter_name }} - [Cập nhật lúc: {{ $chapter->updated_at->format('H:i d/m/Y') }}]</h1>
    <div class="images-container">
        @foreach(explode(',', $chapter->images) as $imagePath)
            <img src="{{ Storage::url($imagePath) }}" alt="{{ $chapter->chapter_name }}">
        @endforeach
    </div>
</body>
</html>
