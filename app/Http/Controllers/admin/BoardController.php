<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class BoardController extends Controller
{
    public function index()
    {
        $board = Board::all();
        return view('admin.pages.board.index', compact('board'));
    }
    public function create()
    {
        return view('admin.pages.board.create');
    }
    public function store(Request $request)
    {
        $board = new Board();
        $this->validate($request, [
            'board_number' => 'number',


        ]);
        // $request->image = $this->imageUpload($request);
        $board->board_number = $request->number;
        $board->board_status = 1;
        if ($board->save()) {
            Session::flash('message', 'thêm tài khoản thành công');
        } else {
            Session::flash('message', 'thêm tài khoản thất bại');
        }
        return redirect()->route('admin.board.index');
    }
    public function destroy(Board $board)
    {
        // Storage::delete($accounts->avatar);
        $board->delete();

        return redirect()->route('admin.board.index');
    }
}
