<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Comic;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $currentMonth =  Carbon::now('Asia/Ho_Chi_Minh')->format('m/Y');
        $currentDate =  Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $dateFirstOfMonth = Carbon::now()->year;
        $dateFirstOfYear = Carbon::now()->year."-01-01";
        if(Carbon::now()->month<10){
            $dateFirstOfMonth .="-0".Carbon::now()->month.'-01';
        }else $dateFirstOfMonth .="-".Carbon::now()->month.'-01';

        //thong ke don hang va doanh thu
        $bills= Bill::where("created_at",">=", $dateFirstOfMonth)->where("created_at","<=", $currentDate)->get();
       
        $totalBillInMonth = count($bills);
        $totalMoneyInMonth = 0;
        foreach($bills as $bill){
           
                $totalMoneyInMonth += $bill->coin;
            
        }
        $comic=Comic::orderby('id','desc')->get();
        $app_product = Comic::all()->count();
        //thong ke thanh vien
        $accounts= User::whereDate("created_at",">=", $dateFirstOfMonth)->whereDate("created_at","<=", $currentDate)->get();
    
        $totalAccountInMonth = count($accounts);
        $years=Bill::select(DB::raw("Year(created_at) as year"))->groupBy(DB::raw("Year(created_at)"))->pluck('year');
        $incomes=Bill::select(DB::raw("SUM(coin) as sum"))->groupBy(DB::raw("Year(created_at)"))->pluck('sum');
        $datas= array();
       
   
        if(count($incomes)>0){
            foreach($years as $index =>$year)
            {
               
                $datas[$year]=$incomes[$index];
      
            }
         }
       
       


        $totalcomic = Comic::all()->count();
        $bill = Bill::all();
        $totalbill = Bill::all()->count();
        $totalcoin = 0;
        foreach ($bill as $bill) {
            $totalcoin = $totalcoin + $bill->coin;
        }
        return view('admin.pages.dashboard', compact('app_product', "totalMoneyInMonth", "totalBillInMonth","totalAccountInMonth"));
    }
}
