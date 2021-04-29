<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Car;
use Auth;
use View;
use MyHelper;

class CarController extends Controller
{
    public function index()
    {
        if (!Auth::check())
        {
            return view('auth.login');
        }

        $CarData = DB::table('tbl_car')
            ->join('tbl_category', 'tbl_car.category_id', '=', 'tbl_category.id')
            ->select('tbl_car.*', 'tbl_category.name as category_name')
            ->get()->toArray();

        $result = [];
        foreach($CarData as $key => $data)
        {
            $result[] = [
                'id' => $data->id,
                'name' => $data->name,
                'category_id' => $data->category_id,
                'category_name' => $data->category_name,
                'price' => MyHelper::indocurrency($data->price),
                'stock' => $data->stock,
                'image' => $data->image
            ];
        }
        // dd($CarData);
        return view::make('dashboard.car.data')->with('result', $result);
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
        $request->validate([
            'name' => 'required|string|max:100',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        Car::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price
        ]);

        return response()->json([
            'success'=> 'Data has been saved',
            'data' => $request->all()
        ]);
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

    public function categoryBox()
    {
        $Category = Category::select('*')->get();

        return response()->json([
            'result' => $Category
        ]);
    }
}
