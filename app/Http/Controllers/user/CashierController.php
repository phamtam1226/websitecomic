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
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;



class CashierController extends Controller
{
    public function index()
    {
        $board = Board::all();
        $food = Food::all();
        $bill = Bill::where('status',  '<', 3)->first();

        return view('cashier.pages.index', compact('board',  'bill', 'food'));
    }
    public function billdetail(Request $request)
    {

        $order = Order::where('board_id', $request->board_id)->where('status', 1)->get();
        $food = Food::all();
        $board  = Board::find($request->board_id);
        $bill = Bill::where('board_id', $request->board_id)->where('status', '<', 3)->first();
        $billorder = Order::where('board_id', $request->board_id)->where('status', '<', 4)->get();
        $inbill = Order::where('board_id', $request->board_id)->where('status', '<', 4)->get();
        return view('cashier.pages.billdetail', compact('food', 'board', 'order', 'billorder', 'bill', 'inbill'));
    }
    public function pay(Request $request)
    {
        $bill  = Bill::find($request->bill_id);
        $bill->status = 0;
        $bill->save();
        $board  = Board::find($bill->board_id);
        $board->board_status = 1;
        $board->save();
    }
    public function inbill($id)
    {
        // Khởi tạo Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isFontSubsettingEnabled', true);

        $pdf = new Dompdf($options);

        // Nếu bạn đã chuyển font vào thư mục 'fonts'
        $fontPath = base_path('../../../public/admin/fonts/DejaVuSans/DejaVuSans.ttf');

        // Cấu hình font cho Dompdf


        $bill = Bill::findOrFail($id);

        $billorder = Order::where('board_id', $bill->board_id)->where('status', '<', 4)->get();
        $inbill = Order::where('board_id', $bill->board_id)->where('status', '<', 4)->get();
        $pdf = Pdf::loadView('invoices.pdf', compact('bill', 'billorder', 'inbill'));

        return $pdf->stream('bill.pdf');
    }
    public function showtotal()
    {
        $currentDate = today();
        $bill  = Bill::all();
        return view('cashier.pages.showtotal', compact('bill'));
        // return view('cashier.pages.showtotal');
        // $board = Board::all();
        // $food = Food::all();
        // $bill = Bill::where('status',  '<', 3)->first();

        // return view('cashier.pages.showtotal', compact('board',  'bill', 'food'));
    }
}
