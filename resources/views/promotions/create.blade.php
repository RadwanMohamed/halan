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

            <form role="form" action="{{route('promotions.store')}}" method="post">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم الكود</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name" class="form-control" placeholder="من فضلك ادخل اسم الكود">
                            @if ($errors->has('name'))
                                <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label> الكود</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="code" class="form-control"
                                   value="{{\App\Promotion::generatePromoCode()}}"></div>
                        @if ($errors->has('name'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('code') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label> عدد مرات الاستخدام </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="count" class="form-control"
                                   placeholder="ادخل عدد مرات استخدام الكود "></div>
                        @if ($errors->has('count'))
                            <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('count') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>نوع الكود </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <select type="text" name="type" class="form-control">
                                <option value="{{App\Promotion::FIXED}}">ثابت</option>
                                <option value="{{App\Promotion::DYNAMIC}}"> نسبة</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>قيمة الخصم </label>
                            <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                                <input type="text" name="value" class="form-control" placeholder=" ادخل قيمة الخصم ">
                            </div>
                            @if ($errors->has('value'))
                                <span class="help-block " role="alert">
                                        <strong class="error">{{ $errors->first('value') }}</strong>
                                    </span>
                            @endif

                        </div>

                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn blue">حفظ</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
