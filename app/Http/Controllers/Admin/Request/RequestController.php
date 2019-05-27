<?php

namespace App\Http\Controllers\Admin\Request;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    private  $data =[];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $requests = \App\Request::select('*');
        foreach (array_except($request->all(),'page') as $key => $value)
        {
            if ($key == '')
                continue;
            if ($key == 'name')
                $requests = $requests->where($key,'like','%'.$value.'%');
            else
            $requests = $requests->where($key,'=',$value);
        }
        $requests = $requests->paginate(50);
        return view('requests.index',compact('requests'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Request $request)
    {
        $this->data['request'] = $request;
        $this->data['orders']  = Order::where('request_id','=',$request->id)->get();
        return view("requests.show",$this->data);
    }

}
