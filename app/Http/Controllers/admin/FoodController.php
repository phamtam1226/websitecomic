<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index()
    {
        $food = Food::all();
        return view('admin.pages.food.index', compact('food'));
    }
    public function create()
    {
        return view('admin.pages.food.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'food_name' => 'required',
            'food_price' => 'required',
            'food_img' => 'required|image',
            'status' => 'required',
            'type' => 'required',

        ]);
        $coverImagePath = $request->file('food_img')->store('public/foods');

        $food = Food::create([
            'food_name' => $request->food_name,
            'food_price' => $request->food_price,
            'food_img' =>   $coverImagePath,
            'status' =>  $request->status,
            'type' =>  $request->type,

        ]);



        if ($food->save()) {
            Session::flash('message', 'thêm món ăn thành công');
        } else {
            Session::flash('message', 'thêm món ăn thất bại');
        }
        return redirect()->route('admin.food.index');
    }
    public function edit(Food $food)
    {
        return view('admin.pages.food.edit', compact('food'));
    }
    public function update(Request $request, Food $food)
    {

        $request->validate([
            'food_name' => 'required',
            'food_price' => 'required',
            'type' => 'required',
            'status' => 'required',

        ]);

        $food->update($request->all());

        if ($food->save()) {
            Session::flash('message', 'Cập nhật món ăn thành công');
        } else {
            Session::flash('message', 'Cập nhật món ăn thất bại');
        }

        return redirect()->route('admin.food.index');
    }
    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()->route('admin.food.index');
    }
    public function checktype(Request $request)
    {

        $food = Food::where('type', $request->type)->get();
        return view('admin.pages.food.listfood', compact('food'));
    }

    public function search(Request $request)
    {
        $food = Food::where([['food_name', 'like', '%' . $request->namesearch . '%']])

            ->paginate(5);
        return View('admin.pages.food.index', ['food' => $food]);
    }
}
