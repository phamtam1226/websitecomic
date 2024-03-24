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
use App\Models\Bill;
use App\Models\BillDetail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\NullableType;


class OrderController extends Controller
{
    public function index()
    {
        $board = Board::all();
        return view('order.pages.index', compact('board'));
    }
    public function back()
    {
        $board = Board::all();
        return back();
    }
    public function order($board_id)
    {
        $order = Order::where('board_id', $board_id)->where('status', 1)->get();
        $food = Food::all();
        $board  = Board::find($board_id);
        $bill = Bill::where('board_id', $board_id)->where('status',  1)->first();
        $billorder = Order::where('board_id', $board_id)->where('status', '<', 4)->where('status', '>', 1)->get();
        $totalorder = 0;
        foreach ($order as $orders) {

            $totalorder = $totalorder + $orders->quantity * $orders->food->food_price;
        }

        return view('order.pages.order', compact('food', 'board', 'order', 'billorder', 'bill', 'totalorder'));
    }
    public function addorder(Request $request)
    {
        $check = Order::where('board_id', $request->board_id)->where('food_id', $request->food_id)->first();

        $order = new Order();
        $order->user_id = $request->user_id;
        $order->board_id = $request->board_id;
        $order->food_id = $request->food_id;
        $order->quantity = $request->quantity;
        $order->status = 1;
        $order->note = $request->note;
        $order->save();
    }

    public function add_bill(Request $request)
    {
        $check = Bill::where('board_id', $request->board_id)->where('status', 1)->first();
        if ($check == null) {
            $order = new Bill();
            $order->board_id = $request->board_id;
            $order->status = 1;
            $order->totalprice = 0;
            $order->save();
            $board = Board::find($request->board_id);
            $board->board_status = 2;
            $board->save();
            $bill = Bill::where('board_id', $request->board_id)->where('status', 1)->first();
            $orders = Order::where('board_id', $request->board_id)->where('status', 1)->get();
            foreach ($orders as $orders) {

                $detail = new BillDetail();
                $detail->bill_id = $bill->id;
                $detail->order_id = $orders->id;
                $detail->status = 1;
                $detail->save();

                $orderbill = Bill::find($bill->id);
                $orderbill->totalprice = $orderbill->totalprice + $orders->quantity * $orders->food->food_price;
                $orderbill->save();


                $order = Order::where('id', $orders->id)->first();
                $order->status = 2;
                $order->save();
            }
        } else {
            $bill = Bill::where('board_id', $request->board_id)->where('status', 1)->first();
            $orders = Order::where('board_id', $request->board_id)->where('status', 1)->get();

            foreach ($orders as $orders) {

                $detail = new BillDetail();
                $detail->bill_id = $bill->id;
                $detail->order_id = $orders->id;
                $detail->status = 1;
                $detail->save();

                $orderbill = Bill::find($bill->id);
                $orderbill->totalprice = $orderbill->totalprice + $orders->quantity * $orders->food->food_price;
                $orderbill->save();

                $order = Order::where('id', $orders->id)->first();
                $order->status = 2;
                $order->save();
            }
        }

        if ($order->save()) {
            Session::flash('message_order', 'Lập Đơn thành Công!');
        } else
            Session::flash('message_order', 'Lập Đơn Thất Bại!');
    }

    public function deletefood(Request $request)
    {


        $order = BillDetail::where('bill_id', $request->bill_id)->where('order_id', $request->order_id)->first();

        $order->delete();
        $check = BillDetail::where('bill_id', $request->bill_id)->where('status', 1)->first();
        if ($check == null) {
            $bill = Bill::find($order->bill_id);
            $bill->delete();

            $board = Board::find($order->board_id);
            $board->board_status = 1;
            $board->save();
        }

        $order = Order::find($request->order_id);
        $order->delete();
    }
    public function deleteorder(Request $request)
    {
        $order = Order::find($request->id);
        $order->delete();
    }
    public function requestpay(Request $request)
    {
        $bill  = Bill::find($request->bill_id);

        $board  = Board::find($bill->board_id);
        $board->board_status = 3;
        $board->save();
    }
    public function search(Request $request)
    {

        // return View('order.pages.order', ['food' => $food]);
        $order = Order::where('board_id', $request->board_id)->where('status', 1)->get();
        $food = Food::where([['food_name', 'like', '%' . $request->namesearch . '%']])
            ->paginate(10);
        $board  = Board::find($request->board_id);
        $bill = Bill::where('board_id', $request->board_id)->where('status',  1)->first();
        $billorder = Order::where('board_id', $request->board_id)->where('status', '<', 4)->get();
        $totalorder = 0;
        foreach ($order as $orders) {
            $totalorder = $totalorder + $orders->quantity * $orders->food->food_price;
        }

        return view('order.pages.order', compact('food', 'board', 'order', 'billorder', 'bill', 'totalorder'));
    }

    public function comics_search_keyword(Request $request)
    {
        $keyword = $request->input('keyword');
        $food = [];

        if (!empty($keyword)) {
            $food = Food::where('food_name', 'LIKE', "{$keyword}%")

                ->get();
        }

        if (!$request->ajax()) {
            return view('order.pages.search_results', compact('food'));
        }

        return response()->json($food);
    }
}
