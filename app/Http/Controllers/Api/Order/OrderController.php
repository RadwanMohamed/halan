<?php

namespace App\Http\Controllers\Api\Order;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class OrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::where("status",Order::UNASSIGNED);
        if ($request->has("from"))
            $orders->where("from",$request->from);
        $orders  = $orders->get();
        return $this->showAll("orders",$orders);
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
      //'name','description','from','to','kilos','cost','client_id'
        $client_id = 1;
        $rules = [
            'name'  => 'required|string',
            'description' => 'required|string',
            'from' => 'required|string',
            'to' =>'required|string',
            'kilos' =>'required|numeric',
        ];
        $this->validate($request,$rules);
        $cost = ($request->kilos >= 10)? 10 : $request->kilos + 10;
        $order = Order::create([
            'name'        => $request->name,
            'description' => $request->description,
            'from'        => $request->from,
            'to'          => $request->to,
            'kilos'       => $request->kilos,
            'cost'        => $cost,
            'client_id'   => $client_id
        ]);
        return $this->showOne('order',$order,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
       return $this->showOne("order",$order);
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
    public function destroy(Order $order)
    {
        if (strtotime($order->created_at) > strtotime("-10 minutes"))
            return response()->json(["error"=>"you cant cancel order after 10 minutes"],422);
        $order->delete();
        return response()->json(["msg"=>"sucess"],200);
    }
}
