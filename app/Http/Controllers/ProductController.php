<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

       return view('product.category');

    }
    public function detailsview(){
       return view('product.product_transaction');

    }
    public function searchday($day){

        $date = Carbon::now()->subDays($day);
        $customerdetails = invoice::with('product')->where('created_at', '>=', $date)->get();
         return response()->json($customerdetails, 200);
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
    public function transaction_details($id){
        $customerdetails = invoice::with('product')->where('product_id',"=", $id)->get();
       //  $customerdetails = CustomeBalance::with('customers')->get();

          return response()->json($customerdetails, 200);


     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|unique:products|max:255',

        ]);
        if ($validatedData) {
            product::insert([
                'product_name' => $request->product_name,
                'created_at' => Carbon::now(),
            ]);
            return response()->json(['status' => 'success', 'message' => 'Product Added SuccessFuly']);

            //return redirect()->back()->with('success', 'Faculty insert successfully');
        } else {
            return response()->json(['status' => 'errors', 'message' => 'Product Already Added']);

        }
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

    public function list( $data)
    {
        if($data == 'all'){

            $faculties = product::all();
        }else{

            $faculties = product::where('product_name','Like','%'.$data.'%')->get();
        }
        return response()->json($faculties, 200);
       //return view('admin.faculty.create', compact('faculties'));

    }


    public function single($data){
        $user = product::where('id',$data)->first();
        return response()->json($user, 200);
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
        $update = product::find($id)->update([
            'product_name' => $request->product_name,


                ]);
            return response()->json($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        }
}
