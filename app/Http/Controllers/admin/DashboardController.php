<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Comic;


use App\Models\Food;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $currentMonth =  Carbon::now('Asia/Ho_Chi_Minh')->format('m/Y');
        $currentDate =  Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $dateFirstOfMonth = Carbon::now()->year;
        $dateFirstOfYear = Carbon::now()->year . "-01-01";
        if (Carbon::now()->month < 10) {
            $dateFirstOfMonth .= "-0" . Carbon::now()->month . '-01';
        } else $dateFirstOfMonth .= "-" . Carbon::now()->month . '-01';

        //thong ke don hang va doanh thu
        $bills = Bill::where("created_at", ">=", $dateFirstOfMonth)->where("created_at", "<=", $currentDate)->get();

        $totalBillInMonth = count($bills);
        $totalMoneyInMonth = 0;
        foreach ($bills as $bill) {
            if ($bill->status == 2) {
                $totalMoneyInMonth += $bill->totalprice;
            }
        }
        $Food = Food::orderby('id', 'desc')->where('status', 1)->get();
        $app_product = Food::all()->count();
        //thong ke thanh vien
        $accounts = User::whereDate("created_at", ">=", $dateFirstOfMonth)->whereDate("created_at", "<=", $currentDate)->get();

        $totalAccountInMonth = count($accounts);
        $years = Bill::select(DB::raw("Year(created_at) as year"))->where('status', '=', 2)->groupBy(DB::raw("Year(created_at)"))->pluck('year');
        $datas = array();



        $ttHuy = Bill::where('status', 0)->count();
        $ttDonmoi = Bill::where('status', 1)->count();
        $ttDuyetdon = Bill::where('status', 3)->count();
        $ttGiaoThanhcong = Bill::where('status', 2)->count();
        $ttVanchuyen = Bill::where('status', 4)->count();
        // dd($ttVanchuyen);
        return view('admin.pages.dashboard', compact('ttDonmoi', 'ttDuyetdon', 'ttGiaoThanhcong', 'ttVanchuyen', 'ttHuy', 'totalMoneyInMonth', 'totalAccountInMonth', 'totalBillInMonth', 'app_product', 'datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout()
    {
    }
}
