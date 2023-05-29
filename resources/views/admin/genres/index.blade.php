<h1>Genres</h1>

<a href="{{ route('admin.genres.create') }}">Create Genre</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($genres as $genre)
            <tr>
                <td>{{ $genre->id }}</td>
                <td>{{ $genre->name }}</td>
                <td>
                    <a href="{{ route('admin.genres.show', $genre) }}">Show</a>
                    <a href="{{ route('admin.genres.edit', $genre) }}">Edit</a>
                    <form action="{{ route('admin.genres.destroy', $genre) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
