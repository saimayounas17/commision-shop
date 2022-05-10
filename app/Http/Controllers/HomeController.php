<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomeBalance;
use App\Models\Expense;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = Customer::all();
        $deposit = Customer::where('balance', '>=', '0')->get();
        $withdraw = Customer::where('balance', '<=', '0')->get();
        $transaction = CustomeBalance::where('details', 'Selling  Product')->OrWhere('details', 'Purchasing Product')->sum('balance');
        $expense = Expense::sum('Amount');

        $product = product::all();
        return view('body.dashboard',compact('customer','product','deposit','withdraw','transaction','expense'));
    }
    public function daily(){
        $customerdetails = CustomeBalance::with('customers','invoice','invoice.product')->latest()->get();
        return response()->json($customerdetails, 200);

    }
    public function dashboard(){

    }
}
