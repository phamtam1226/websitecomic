<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.pages.genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres'
        ]);

        $genre=Genre::create($request->all());
        if($genre->save())
        {
            Session::flash('message','thêm thể loại thành công');
        }
        else
        {
        Session::flash('message','thêm thể loại thất bại');
        }
        return redirect()->route('admin.genres.index');
    }

    public function show(Genre $genre)
    {
        return view('admin.pages.genres.show', compact('genre'));
    }

    public function edit(Genre $genre)
    {
        return view('admin.pages.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|unique:genres,name,' . $genre->id
        ]);

        $genre->update($request->all());

        if($genre->save())
        {
            Session::flash('message','Cập nhật thể loại thành công');
        }
        else
        {
        Session::flash('message','Cập nhật thể loại thất bại');
        }
        return redirect()->route('admin.genres.index');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('admin.genres.index');
    }    
}
