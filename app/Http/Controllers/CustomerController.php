<?php

namespace App\Http\Controllers;

use App\Models\CustomeBalance;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('customer.customer');
    }


    public function list( $data)
    {
        if($data == 'all'){

            $faculties = Customer::all();
        }else{

            $faculties = Customer::where('Name','Like','%'.$data.'%' )->orWhere('mobile','Like','%'.$data.'%' )->get();
        }
        return response()->json($faculties, 200);
       //return view('admin.faculty.create', compact('faculties'));

    }
    public function single($data){
        $user = Customer::where('id',$data)->first();
        return response()->json($user, 200);
    }
    public function transaction(Request $request)
    {

        if($request->type == "deposit"){
            CustomeBalance::insert([
                'customer_id' => $request->id,
                'balance' =>$request->amount,
                'details' =>"Deposit Amount",
                'invoice_id'=> '0',
                'created_at' => Carbon::now(),

            ]);
            $customerdetails = Customer::where('id',"=", $request->id)->first();
            if($customerdetails != null){
               $customerbalance = ((floatval($customerdetails->balance) + (floatval($request->amount))));
               Customer::where('id',"=", $request->id)->first()->update([
                   'balance' =>$customerbalance,
                   ]);}
        }else if($request->type == "Withdraw"){
            CustomeBalance::insert([
                'customer_id' => $request->id,
                'balance' =>(floatval($request->amount)*-1),
                'details' =>"Withdraw Amount",
                'invoice_id'=> '0',
                'created_at' => Carbon::now(),

            ]);



            $customerdetails = Customer::where('id',"=", $request->id)->first();
            if($customerdetails != null){
               $customerbalance = ((floatval($customerdetails->balance) - (floatval($request->amount))));
               Customer::where('id',"=", $request->id)->first()->update([
                   'balance' =>$customerbalance,
                   ]);
                }
        }
    }


    public function transaction_details($id){
       $customerdetails = CustomeBalance::with('customers','invoice','invoice.product')->where('customer_id',"=", $id)->get();
      //  $customerdetails = CustomeBalance::with('customers')->get();
         return response()->json($customerdetails, 200);


    }
    public function searchday($day){

        $date = Carbon::now()->subDays($day);
        $customerdetails = CustomeBalance::with('customers','invoice','invoice.product')->where('created_at', '>=', $date)->get();
         return response()->json($customerdetails, 200);
       }


    public function detailsview(){
        return view('customer.customer_details');
    }
    public function report(){
        return view('customer.customer_daily_report');
    }
    public function store(Request $request){
        $customer =  Customer::insert([
            'Name' => $request->name,
            'mobile' => $request->mobile,
            'details' => $request->details,
            'created_at' => Carbon::now(),


        ]);
    }



    public function destroy($id)
    {

        DB::table('customers')->where('id',$id)->delete();
        }


}
