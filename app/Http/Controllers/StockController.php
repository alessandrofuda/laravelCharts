<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use DB;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        return view('index');

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Stock');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Stock::create([
            'stockName' => $request->stockName,
            'stockPrice' => $request->stockPrice,
            'stockYear' => $request->stockYear,            
        ]);

        return redirect('stocks');
    }



    public function chart() 
    {

        // Since there can be so much data --> NOT use Eloquent ORM BUT Query Builder ..
        $result = DB::table('stocks')->where('stockName', 'Infosys')
                                     ->orderBy('stockYear', 'ASC')
                                     // ->groupBy('stockYear')
                                     ->select('stockYear', DB::raw('avg(stockPrice) as stockPrice'))  // if there are double years for the same stockName
                                     ->groupBy('stockYear')
                                     ->get();

        return response()->json($result);

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


}
