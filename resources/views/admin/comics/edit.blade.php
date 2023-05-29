<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chỉnh sửa truyện</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: top;
            height: 100vh;
            background-color: #333;
        }
        .comic-detail {
            display: flex;
            flex-direction: column;
            width: 66.66%;
            align-items: flex-start;
            padding: 10px;
            background-color: #fff;
        }
        .comic-detail h1 {
            margin-top: 0;
        }
        .comic-detail-image {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .comic-detail-image img {
            width: 200px;
            height: 300px;
            margin-right: 20px;
        }
        .comic-details {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 75%;
            flex: 1;
        }
        .comic-details p {
            margin-top: 0;
        }
        .comic-meta {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .comic-meta-item {
            margin-right: 20px;
        }
        .chapter-list {
            margin-top: 20px;
        }
        .chapter-list ul {
            list-style: none;
            padding: 0;
        }
        .chapter-list li {
            margin-bottom: 10px;
        }
        .chapter-list a {
            text-decoration: none;
            color: #000;
        }
        .chapter-list a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="comic-detail">
        <h1>Chỉnh sửa truyện</h1>
        <form action="{{ route('admin.comics.update', $comic) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="comic-detail-image">
                <div style="width: 35%;">
                    <img id="comic-cover-image" src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}">
                    <input type="file" id="cover_image" name="cover_image" required onchange="updateImagePreview(this)">
                </div>

                <div class="comic-details">
                    <label for="comic_name">Tên Truyện:</label>
                    <input type="text" id="comic_name" name="comic_name" value="{{ $comic->comic_name }}" required>
                        
                    <label for="genre_id">Thể loại:</label>
                    <select id="genre_id" name="genre_id">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @if($comic->genre_id == $genre->id) selected @endif>{{ $genre->name }}</option>
                        @endforeach
                    </select>

                    <label for="status">Tình trạng:</label>
                    <input type="text" id="status" name="status" value="{{ $comic->status }}" required>
                </div>
            </div>
            <label for="description">Nội Dung:</label>
            <textarea id="description" name="description">{{ $comic->description }}</textarea>
            <button type="submit">Cập nhật truyện</button>
        </form>
    </div>
    <script>
        function updateImagePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('comic-cover-image').src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
