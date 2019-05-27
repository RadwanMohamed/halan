<?php

namespace App\Http\Controllers\Admin\CutterKind;

use App\CutterKind;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CutterKindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cutters = CutterKind::all();
        return view('cutterkinds.index',compact('cutters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cutterkinds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CutterKind::create([
           'name_ar' => $request->name_ar,
           'name_en' => $request->name_en,
           'description_ar' => $request->description_ar,
           'description_en' => $request->description_en,
        ]);
        return redirect(route('cutterkinds.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cutter = CutterKind::find($id);
        return view('cutterkinds.edit',compact('cutter'));
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
        $cutter = CutterKind::find($id);
        $cutter->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
        ]);
        return redirect(route('cutterkinds.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CutterKind::where('id',$id)->delete();
        return redirect(route('cutterkinds.index'));
    }
}
