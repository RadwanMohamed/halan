@extends('layouts.app')

@section('page-title')
    <h1 class="page-title">  لوحة التحكم
        <small>عرض جميع الاعضاء</small>
    </h1>
@endsection

@section('content')


    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">
            @if(\Session::has('status'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('status') !!}</li>
                    </ul>
                </div>
            @endif
            <form role="form" action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم المنتج بالعربي</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name_ar" class="form-control" placeholder="من فضلك ادخل الاسم باللغة العربية" value="{{$product->name_ar}}"> </div>
                    </div>
                    <div class="form-group">
                        <label>اسم المنتج بالانجليزي</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name_en" class="form-control" placeholder="من فضلك ادخل الاسم باللغة الانجليزية" value="{{$product->name_en}}"> </div>
                    </div>

                    <div class="form-group">
                        <label>صورة الصنف</label>
                        <img src="{{Request::root()}}/img/{{$product->photo1}}" class="rounded" style="width: 50px; height:50;">

                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-envelope"></i>
                            </span>
                            <input type="file" name="photo1" class="form-control" placeholder="من فضلك ادخل صورة الصنف "> </div>
                    </div>
                    <div class="form-group">
                        <label>صورة الصنف</label>
                        <img src="{{Request::root()}}/img/{{$product->photo2}}" class="rounded" style="width: 50px; height:50;">

                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-envelope"></i>
                            </span>
                            <input type="file" name="photo2" class="form-control" placeholder="من فضلك ادخل صورة الصنف "> </div>
                    </div>
                    <div class="form-group">
                        <label> وصف باللغة العربية </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </span>
                            <textarea type="text" name="description_ar" class="form-control" placeholder="اضف وصف باللغة العربية "> {{$product->description_ar}} </textarea></div>
                    </div>
                    <div class="form-group">
                        <label> وصف باللغة الانجليزية </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <textarea type="text" name="description_en" class="form-control" placeholder="اضف وصف باللغة الانجليزية "> {{$product->description_en}} </textarea> </div>
                    </div>
                    <div class="form-group">
                        <label> تصنيف المنتج </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <select type="text" name="category_id" class="form-control">
                                @foreach($categories as $key => $value)
                                    <option value="{{$key}}" @if($key == $product->category_id) selected @endif>{{$value}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>  <div class="form-group">
                        <label>  السعر </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <input type="text" name="price" class="form-control" placeholder="اضف السعر" value="{{$product->price}}">  </div>
                    </div>
                </div>  <div class="form-group">
                    <label>  الكمية </label>
                    <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                        <input type="text" name="quantity" class="form-control" placeholder="اضف الكمية المرادة" value="{{$product->quantity}}">  </div>
                </div>

                <div class="form-group">
                    <label>  الفروع المتاح فيها المنتج </label>
                    <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                        <select id="multiple" class="form-control select2-multiple" multiple name="branches[]">
                            @foreach($branches as $key=> $branch)
                                <option value="{{$key}}" @if(array_key_exists($key,$productbranches)) selected @endif >{{$branch}}</option>
                            @endforeach

                        </select>
                    </div>
                    @if ($errors->has('quantity'))
                        <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('quantity') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn blue">حفظ</button>
                </div>

        </div>
        </form>
    </div>
    </div>

@endsection
