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

            <form role="form" action="{{route('branches.store')}}" method="post">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم الفرع</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name" class="form-control" placeholder="من فضلك ادخل اسم الفرع">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>مدينة الفرع</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="city" class="form-control" placeholder="من فضلك ادخل  مدينة الفرع">
                        </div>
                        @if ($errors->has('city'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('city') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>وصف</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <textarea type="text" name="description" class="form-control" placeholder="من فضلك ادخل  وصف الفرع"></textarea>
                        </div>
                        @if ($errors->has('description'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>اسم الفرع باللغة الانجليزية</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name_en" class="form-control" placeholder="من فضلك ادخل اسم الفرع باللغة الانجليزية">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>مدينة الفرع باللغة الانجليزية</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="city_en" class="form-control" placeholder="من فضلك ادخل  مدينة الفرع باللغة الانجليزية">
                        </div>
                        @if ($errors->has('city_en'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('city_en') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>وصف باالغة الانجليزية</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <textarea type="text" name="description_en" class="form-control" placeholder="من فضلك ادخل  وصف الفرع"></textarea>
                        </div>
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
