<?php

namespace App\Http\Controllers;

use App\Models\CustomeBalance;
use App\Models\Customer;
use App\Models\invoice;
use App\Models\product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchday($day){

        $date = Carbon::now()->subDays($day);
        $customerdetails = invoice::with('product')->where('created_at', '>=', $date)->get();
         return response()->json($customerdetails, 200);
       }

public function invoiceBuy(Request $request){
    if($request->check == "news"){
       $customer =  Customer::insert([
            'Name' => $request->name,
            'mobile' => $request->mobile,
            'details' => $request->details,
            'created_at' => Carbon::now(),


        ]);
        $ID = DB::table('customers')->latest()->first();

        $request->customer_id = $ID->id;
    }


    invoice::insert([
        'price' => $request->price,
        'bags' => $request->bags,
        'weight' => $request->weight,
        'status' => $request->status,
        //'weight' => $request->details,
        'product_id' => $request->product_id,
        'customer_id' => $request->customer_id,

        'created_at' => Carbon::now(),


    ]);
    //getting latest invoiceID
    $invoice_id = DB::table('invoices')->latest()->first();
    $update = product::where('id',"=", $request->product_id)->first();
    $value = "";

    if($request->status == "0"){
        $value = ((floatval($update->available_weight) + (floatval($request->weight))));

        CustomeBalance::insert([
            'customer_id' => $request->customer_id,
            'balance' =>(floatval($request->total_price)*-1),
            'details' =>"Purchasing Product",
            'invoice_id'=> $invoice_id->id,
            'created_at' => Carbon::now(),

        ]);

      //  update balance customer
      $customerdetails = Customer::where('id',"=", $request->customer_id)->first();
     if($customerdetails != null){
        $customerbalance = ((floatval($customerdetails->balance) - (floatval($request->total_price))));
        Customer::where('id',"=", $request->customer_id)->first()->update([
                'balance' =>$customerbalance,
                ]);


     }

    } else if($request->status == "1"){
        $value = ((floatval($update->available_weight) - (floatval($request->weight))));
        CustomeBalance::insert([
            'customer_id' => $request->customer_id,
            'balance' =>$request->total_price,
            'details' =>"Selling  Product",
            'invoice_id'=> $invoice_id->id,
            'created_at' => Carbon::now(),

        ]);
      $customerdetails = Customer::where('id',"=", $request->customer_id)->first();
         if($customerdetails != null){
            $customerbalance = ((floatval($customerdetails->balance) + (floatval($request->total_price))));
            Customer::where('id',"=", $request->customer_id)->first()->update([
                'balance' =>$customerbalance,
                ]);


     }

    }


    product::where('id',"=", $request->product_id)->first()->update([
        'available_weight' => $value,
    ]);





}
public function leatestid(){
    $invoice_id = DB::table('invoices')->latest()->first();
    return response()->json($invoice_id);
}
public function detailsview(){
    return view('product.product_details');
}
public function fetchdetails($id){
    $customerdetails = invoice::with('product')->get();
   //  $customerdetails = CustomeBalance::with('customers')->get();

      return response()->json($customerdetails, 200);


 }

}
