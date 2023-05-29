<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chỉnh sửa chương</title>
</head>
<body>
    <h1>Chỉnh sửa chương: {{ $chapter->chapter_name }}</h1>
    <form action="{{ route('admin.comics.chapters.update', ['comic' => $comic, 'chapter' => $chapter]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="chapter_name">Tên chương:</label><br>
        <input type="text" id="chapter_name" name="chapter_name" value="{{ $chapter->chapter_name }}"><br>
        <label for="images">Ảnh:</label><br>
        <input type="file" id="images" name="images[]" multiple><br>
        <input type="submit" value="Cập nhật chương">
    </form>
</body>
</html>
