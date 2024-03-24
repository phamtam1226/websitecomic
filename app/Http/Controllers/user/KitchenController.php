<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Food;
use App\Models\Order;
use App\Models\Board;
use App\Models\BillDetail;
use App\Models\Bill;
use Illuminate\Support\Facades\Session;


class KitchenController extends Controller
{
    public function index()
    {
        $board = Board::all();
        $food = Food::where('type', 1)->get();
        $bill = Bill::where('status', 1)->get();
        $food_type = 1;
        $order = Order::all();
        return view('kitchen.pages.index', compact('board',  'bill', 'food', 'food_type', 'order'));
    }
    public function billdetail(Request $request)
    {
        $bill = Bill::find($request->bill_id);
        $billdetail = Order::where('status', 2)->where('board_id',  $bill->board_id)->get();
        return view('kitchen.pages.billdetail', compact('billdetail', 'bill'));
    }
    public function complete(Request $request)
    {
        $bill = Bill::find($request->bill_id);
        $order = Order::where('board_id',  $bill->board_id)->where('status', 2)->get();
        foreach ($order as $order) {
            $order->status = 3;
            $order->save();
        }
        $data = $bill->board->board_number;
        return $data;
    }
    public function over(Request $request)
    {
        $food = Food::find($request->food_id);
        $food->status = 0;
        $food->save();
    }
    public function still(Request $request)
    {
        $food = Food::find($request->food_id);
        $food->status = 1;
        $food->save();
    }
    public function checktype($food_type)
    {

        $food = Food::where('type', $food_type)->get();
        $board = Board::all();
        $bill = Bill::where('status', 1)->get();
        $food_type = $food_type;

        return view('kitchen.pages.index', compact('board',  'bill', 'food', 'food_type'));
    }
    public function search(Request $request)
    {

        // return View('order.pages.order', ['food' => $food]);

        $food = Food::where([['food_name', 'like', '%' . $request->namesearch . '%']])->where('type', $request->food_type)->paginate(10);
        $board = Board::all();
        $bill = Bill::where('status', 1)->get();
        $food_type = $request->food_type;

        return view('kitchen.pages.index', compact('board',  'bill', 'food', 'food_type'));
    }
}
