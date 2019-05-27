<?php

namespace App\Http\Controllers\Admin\Order;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::select('*');
        foreach (array_except($request->all(),'page') as $key => $value)
        {
            if ($key == '')
                continue;
            if ($key == 'name')
                $orders = $orders->where($key,'like','%'.$value.'%');
            $orders = $orders->where($key,'=',$value);
        }
        $orders = $orders->paginate(50);

        return view('orders.index',compact('orders'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view("orders.show",compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view("order.edit",compact("order"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->status = $request->status;
        if ($order->isClean())
            return redirect()->back()->with("status",'يجب اضافة قيم جديدة لاتمام عملية التعديل');
        $order->save();
        return redirect(url('/adminpanel/requests/'.$order->request_id.'/orders'));
    }

}
