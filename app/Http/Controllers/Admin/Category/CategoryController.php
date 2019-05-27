<?php

namespace App\Http\Controllers\Admin\Category;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name_ar' => 'required|string|max:190',
            'name_en' => 'required|string|max:190',
            'photo' => 'required|image',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = Category::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'photo'  =>  $request->photo->store(''),
            'description_ar' => $request->name_ar,
            'description_en' => $request->name_en,
        ]);

        return redirect(route('categories.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("categories.edit",compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $rules  = [
            'name_ar' => 'required|string|max:190',
            'name_en' => 'required|string|max:190',
            'photo' => 'image',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
        ];
        $this->validate($request,$rules);

        if ($request->has('photo'))
        {
            if (is_file($category->photo))
                File::delete($category->photo);
            $category->photo = $request->photo->store('');
        }

        $category->name_ar =$request->name_ar;
        $category->name_en =$request->name_en;
        $category->description_ar =$request->description_ar;
        $category->description_en =$request->description_en;
        if ($category->isClean())
            return redirect()->back()->with('status','يجب ادخال قيم جديدة لاتمام عملية التعديل');
        $category->save();
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (is_file($category->photo))
            File::delete($category->photo);
        $category->delete();
        return redirect(route('categories.index'));
    }
}
