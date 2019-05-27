<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $promotions = Promotion::all();
        return view('promotions.index',compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:190',
            'code' => 'required|string',
            'count' => 'required|numeric',
            'type' => 'required|string',
            'value' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $code = Promotion::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'count'=>$request->count,
            'type'=>$request->type,
            'value'=>$request->value,
        ]);

        return redirect(route('promotions.index'))->with("status",'تمت اضافة الكود بنجاح');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Promotion::where('id',$id)->delete();
        return redirect(route('promotions.index'));
    }

    public  function activate (Promotion $promotion)
    {
        if ($promotion->status == Promotion::ACTIVATED)
             return redirect()->back()->with('status','عفوا هذا الكود مفعل بالفعل');
        $promotion->status = Promotion::ACTIVATED;
        $promotion->save();
        return redirect(route('promotions.index'))->with('status','تم تفعيل الكود بنجاح');
    }
    public  function deactivate (Promotion $promotion)
    {
        if ($promotion->status == Promotion::EXPIRED)
             return redirect()->back()->with('status','عفوا هذا الكود غير مفعل بالفعل');
        $promotion->status = Promotion::EXPIRED;
        $promotion->save();
        return redirect(route('promotions.index'))->with('status','تم ايقاف الكود بنجاح');
    }

}
