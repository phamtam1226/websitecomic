<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thêm chương mới</title>
</head>
<body>
    <h1>Thêm chương mới</h1>
    <form action="{{ route('comics.chapters.store', $comic) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="chapter_name">Tên chương:</label><br>
        <input type="text" id="chapter_name" name="chapter_name"><br>
        <label for="images">Ảnh:</label><br>
        <input type="file" id="images" name="images[]" multiple><br>
        <input type="submit" value="Thêm chương">
    </form>
</body>
</html>