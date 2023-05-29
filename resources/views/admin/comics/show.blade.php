<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chi tiết truyện</title>
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
            align-items: center;
            margin-bottom: 20px;
        }
        .comic-detail-image img {
            width: 200px;
            height: 300px;
            margin-right: 20px;
        }
        .comic-details {
            width: 100%;
            flex: 1;
        }
        .comic-details p {
            margin-top: 0;
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
        <h1>Chi tiết truyện</h1>
        <div class="comic-detail-image">
            <img src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}">
            <div class="comic-details">
                <h1>{{ $comic->comic_name }}</h1>
                <p>Tên khác: </p>
                <p>Thể Loại: {{ $comic->genre->name }}</p>
                <p>Tác giả: </p>
                <p>Nhóm dịch: </p>
                <p>Tình Trạng: {{ $comic->status }}</p>
                <p>Lượt xem:</p>
                <p>Xếp hạng:</p>
                <p>Số lượt đánh giá:</p>
                <div>
                    <button>Theo dõi</button>
                    <button>Đọc từ đầu</button>
                    <button>Đọc mới nhất</button>
                </div>
                <div>
                    <a href="{{ route('comics.edit', $comic) }}">Chỉnh sửa</a>
                    <form action="{{ route('comics.destroy', $comic) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xoá</button>
                    </form>
                </div>
            </div>
        </div>
        <div>
            Nội dung:
            <p>{{ $comic->description }}</p>
        </div>
        <div class="chapter-list">
            <h3>Danh sách chương:</h3>
            <a href="{{ route('comics.chapters.create', $comic) }}">Thêm chương mới</a>

            <ul>
                @foreach ($comic->chapters as $chapter)
                <li>
                    <a href="{{ route('comics.chapters.show', ['comic' => $comic, 'chapter' => $chapter]) }}">{{ $chapter->chapter_name }}</a>

                    <a href="{{ route('comics.chapters.edit', ['comic' => $comic, 'chapter' => $chapter]) }}">Chỉnh sửa</a>

                    <form action="{{ route('comics.chapters.destroy', ['comic' => $comic, 'chapter' => $chapter]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xoá</button>
                    </form>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</body>
</html>
