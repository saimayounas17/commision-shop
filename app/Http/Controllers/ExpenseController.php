<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ExpenseController extends Controller
{


    public function store(Request $request)
    {


            Expense::insert([
                'Amount' => $request->Amount,
                'details' => $request->Details,
                'created_at' => Carbon::now(),
            ]);
            return response()->json(['status' => 'success', 'message' => 'Expense Added SuccessFuly']);

            //return redirect()->back()->with('success', 'Faculty insert successfully');

    }

    public function list( $data)
    {
        if($data == 'all'){

            $faculties = Expense::all();
        }else{

            $faculties = Expense::where('details','Like','%'.$data.'%')->orWhere('details','Like','%'.$data.'%')->get();
        }
        return response()->json($faculties, 200);
       //return view('admin.faculty.create', compact('faculties'));

    }
    public function amount( )
    {


            $faculties = Expense::get();

        return response()->json($faculties, 200);
       //return view('admin.faculty.create', compact('faculties'));

    }


    public function update(Request $request, $id)
    {
        $update = Expense::where('id',$id)->update([
                'Amount' => $request->Amount,
                'details' => $request->Details,

                ]);
            return response()->json($update);
    }
    public function destroy($id)
    {
        DB::table('expenses')->where('id',$id)->delete();

    }


}
