@extends('layouts.app')

@section('page-title')
    <h1 class="page-title">  لوحة التحكم
        <small>عرض جميع الاعضاء</small>
    </h1>
@endsection

@section('content')


    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">

            <form role="form" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم الصنف بالعربي</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name_ar" class="form-control" placeholder="من فضلك ادخل الاسم باللغة العربية"> </div>
                        @if ($errors->has('name_ar'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('name_ar') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>اسم الصنف بالانجليزي</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name_en" class="form-control" placeholder="من فضلك ادخل الاسم باللغة الانجليزية"> </div>
                        @if ($errors->has('name_en'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('name_en') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>صورة الصنف</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-envelope"></i>
                            </span>
                            <input type="file" name="photo1" class="form-control" placeholder="من فضلك ادخل صورة الصنف "> </div>
                        @if ($errors->has('photo1'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('photo1') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>صورة الصنف</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-envelope"></i>
                            </span>
                            <input type="file" name="photo2" class="form-control" placeholder="من فضلك ادخل صورة الصنف "> </div>
                        @if ($errors->has('photo2'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('photo2') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label> وصف باللغة العربية </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </span>
                            <textarea type="text" name="description_ar" class="form-control" placeholder="اضف وصف باللغة العربية "> </textarea></div>
                        @if ($errors->has('description_ar'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('description_ar') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label> وصف باللغة الانجليزية </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <textarea type="text" name="description_en" class="form-control" placeholder="اضف وصف باللغة الانجليزية "> </textarea> </div>
                        @if ($errors->has('description_en'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('description_en') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label> تصنيف المنتج </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <select type="text" name="category_id" class="form-control">
                                @foreach($categories as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>  <div class="form-group">
                        <label>  السعر </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <input type="text" name="price" class="form-control" placeholder="اضف السعر">  </div>
                        @if ($errors->has('price'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('price') }}</strong>
                                    </span>
                        @endif
                    </div>
                    </div>
                <div class="form-group">
                        <label>  الكمية </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <input type="text" name="quantity" class="form-control" placeholder="اضف الكمية المرادة">  </div>
                    @if ($errors->has('quantity'))
                        <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('quantity') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                        <label>  الفروع المتاح فيها المنتج </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <select id="multiple" class="form-control select2-multiple" multiple name="branches[]">
                                    @foreach($branches as $branch)
                                    <option value="{{$branch->id}}" >{{$branch->name}}</option>
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
