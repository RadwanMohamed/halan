<?php

namespace App\Http\Controllers\Admin\Product;

use App\BrancesProducts;
use App\Branch;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use ImageIntervention;

class ProductController extends Controller
{
    private  $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(50);
        return view('products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->data['categories'] = $this->objectToArray(Category::all());
        $this->data['branches']   = Branch::all();
        return view('products.create',$this->data);
    }

    public function objectToArray($object)
    {
        $data = [];
        foreach ($object as $value)
        {
            $data[$value->id] = $value->name_ar;
        }
        return $data;
    }
    public function objectsToArray($object)
    {
        $data = [];
        foreach ($object as $value)
        {
            $data[$value->id] = $value->name;
        }
        return $data;
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
            'photo1' => 'required|image',
            'photo2' => 'required|image',
            'price' => 'required|numeric',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $product = Product::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'photo1'   =>   $request->photo1->store(''),
            'photo2'   =>   $request->photo2->store(''),
            'price' =>   $request->price,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'quantity'       => $request->quantity,
            'category_id' => $request->category_id,
        ]);
//        dd("".public_path().'/images/'.$product->photo1);
        $this->imageIntervention('img/'.$product->photo1,150,150);
        $this->imageIntervention('img/'.$product->photo2,512,300);
        $product->branches()->syncWithoutDetaching($request->branches);
        return redirect(route('products.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->data['product'] = $product;
        $this->data['branches']   = $this->objectsToArray(Branch::all());
        $this->data['productbranches'] = $this->objectsToArray($product->branches);
        $this->data['categories'] = $this->objectToArray(Category::all());
//        dd($product->photo1);

        return view('products.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules  = [
            'name_ar' => 'required|string|max:190',
            'name_en' => 'required|string|max:190',
            'photo1' => 'image',
            'photo2' => 'image',
            'price' => 'required|numeric',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
        ];
        $this->validate($request,$rules);
        if ($request->has('photo'))
        {
            if (is_file($product->photo))
                File::delete($product->photo);

            $product->photo1 = $request->photo1->store('');
            $product->photo2 = $request->photo2->store('');
            $this->imageIntervention('img/'.$product->photo1,150,150);
            $this->imageIntervention('img/'.$product->photo2,512,300);
        }
        $product->name_ar =$request->name_ar;
        $product->name_en =$request->name_en;
        $product->description_ar =$request->description_ar;
        $product->description_en =$request->description_en;
        $product->quantity =$request->quantity;
        $product->category_id =$request->category_id;
        BrancesProducts::where('product_id',$product->id)->delete();
        $product->branches()->syncWithoutDetaching($request->branches);

//        if ($product->isClean())
//            return redirect()->back()->with('status','يجب ادخال قيم جديدة لاتمام عملية التعديل');
        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
    protected function imageIntervention($image,$h,$w)
    {
        $img = ImageIntervention::make($image);
        $img->resize($h,$w);
        $img->save($image);
    }
}
