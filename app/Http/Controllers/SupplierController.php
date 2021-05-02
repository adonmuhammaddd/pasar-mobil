<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Supplier;
use Auth;
use View;

class SupplierController extends Controller
{
    public function index()
    {
        if (!Auth::check())
        {
            return view('auth.login');
        }

        $SupplierkData = DB::table('tbl_supplier')->get();
        
        return view::make('dashboard.supplier.data')->with('result', $SupplierkData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required'
        ]);

        Supplier::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'description' => $request->description
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
}
