<?php

namespace App\Http\Controllers\Api\Order;

use App\Order;
use App\OrderUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
    public function store(Request $request,$id)
    {
        $rules = [
            'status' => 'required|in:'.Order::APPROVED.','.Order::REJECTED,

        ];
        $this->validate($request,$rules);
        OrderUser::where("id",$id)->update(["status"=>$request->status]);
        return response()->json(["message"=>"success"],200);
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
    public function orderAction(Request $request)
    {
        if (!$request->has('status'))
            return response()->json(["error"=>"the client must accept or refuse the driver "],422);
        $status = $request->status;
        $order = OrderUser::where("order_id",$request->order_id)->where("driver_id",$request->driver_id)->update(["status"=>$request->status]);
        return response()->json(["msg"=>"success"],200);
    }
}
