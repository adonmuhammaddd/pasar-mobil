<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Customer;
use Auth;
use View;

class CustomerController extends Controller
{
    public function index()
    {
        if (!Auth::check())
        {
            return view('auth.login');
        }

        $CustomerData = DB::table('tbl_customer')->get();
        
        return view::make('dashboard.customer.data')->with('result', $CustomerData);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|max:15',
            'address' => 'required'
        ]);

        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return response()->json([
            'success'=> 'Data has been saved',
            'data' => $request->all()
        ]);
    }

    public function show($id)
    {
        //
    }

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
}
