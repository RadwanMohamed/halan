@extends('layouts.app')

@section('page-title')
    <h1 class="page-title"> لوحة التحكم
        <small>عرض جميع الاعضاء</small>
    </h1>
@endsection

@section('content')


    {{--
            `name`, `email`, `phone`, `password`, `api_token`, `role`, `status`, `city`, `address`, `verify`
    --}}
    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">

            <form role="form" action="{{route('cuttersize.store')}}" method="post">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name_ar" class="form-control" placeholder="من فضلك ادخل الاسم بالعربي">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>اسم </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name_en" class="form-control" placeholder="من فضلك ادخل الاسم بالانجليزي ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>الوصف بالعربي</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <textarea type="text" name="description_ar" class="form-control"  > </textarea></div>
                    </div>
                    @if ($errors->has('description_ar'))
                        <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('description_ar') }}</strong>
                                    </span>
                    @endif
                </div>
                    <div class="form-group">
                        <label>الوصف باللغة الانجليزية</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <textarea type="text" name="description_en" class="form-control"  > </textarea></div>
                        @if ($errors->has('description_en'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('description_en') }}</strong>
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
