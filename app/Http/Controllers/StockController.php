<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Stock;
use App\Car;
use App\Supplier;
use Auth;
use View;

class StockController extends Controller
{
    public function index()
    {
        if (!Auth::check())
        {
            return view('auth.login');
        }

        $StockData = DB::table('tbl_stock')->get();
        
        return view::make('dashboard.stock.data')->with('result', $StockData);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|numeric',
            'type' => 'required',
            'detail' => 'required|max:200',
            'supplier_id' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

        Stock::create([
            'car_id' => $request->car_id,
            'type' => $request->type,
            'detail' => $request->detail,
            'supplier_id' => $request->supplier_id,
            'quantity' => $request->quantity,
            'user_id' => Auth::user()->id
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

    public function supplierBox()
    {
        $Supplier = Supplier::select('*')->get();

        return response()->json([
            'result' => $Supplier
        ]);
    }

    public function carBox()
    {
        $Car = Car::select('*')->get();

        return response()->json([
            'result' => $Car
        ]);
    }
}
