@extends('layouts.app')

@section('page-title')
    <h1 class="page-title"> لوحة التحكم
        <small>تعديل نوع القطع</small>
    </h1>
@endsection

@section('content')


    {{--
            `name`, `email`, `phone`, `password`, `api_token`, `role`, `status`, `city`, `address`, `verify`
    --}}
    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">

            <form role="form" action="{{route('cutterkinds.update',$cutter->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم بالعربي</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name_ar" class="form-control" value="{{$cutter->name_ar}}">
                        </div>
                    </div>
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم بالانجليزي</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name_en" class="form-control" value="{{$cutter->name_en}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label> الوصف باللغة العربية</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <textarea type="text" name="description_ar" class="form-control"  >{{$cutter->description_ar}} </textarea></div>
                    </div>
                        @if ($errors->has('description_ar'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('description_ar') }}</strong>
                                    </span>
                        @endif
                    </div>

<div class="form-group">
                        <label> الوصف باللغة الانجليزية  </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <textarea type="text" name="description_en" class="form-control"  >{{$cutter->description_en}} </textarea></div>
                    </div>
                        @if ($errors->has('description'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('description') }}</strong>
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
