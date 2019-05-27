@extends('layouts.app')

@section('page-title')
    <h1 class="page-title">  لوحة التحكم
        <small>عرض جميع الاعضاء</small>
    </h1>
@endsection

@section('content')


    {{--
            `name`, `email`, `phone`, `password`, `api_token`, `role`, `status`, `city`, `address`, `verify`
    --}}
    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">

            <form role="form" action="{{route('users.store')}}" method="post">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم المستخدم</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name" class="form-control" placeholder="من فضلك ادخل اسم المستخدم"> </div>
                    </div>
                    <div class="form-group">
                        <label>البريد الالكتروني</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-envelope"></i>
                            </span>
                            <input type="text" name="email" class="form-control" placeholder="من فضلك ادخل البريد الالكتروني "> </div>
                    </div>
                    <div class="form-group">
                        <label> رقم المحمول </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </span>
                            <input type="text" name="phone" class="form-control" placeholder="من فضلك ادخل رقم المحمول "> </div>
                    </div>
                    <div class="form-group">
                        <label> كلمة المرور </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="من فضلك ادخل كلمة المرور "> </div>
                    </div>
                    <div class="form-group">
                        <label>تاكيد كلمة المرور </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-key"></i>
                            </span>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="من فضلك  اعد ادخال كلمة المرور "> </div>
                    </div>
                    <div class="form-group">
                        <label>اختر الصلاحية </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-unlock"></i>
                            </span>
                            <select name="role" class="form-control">
                                <option value="{{\App\User::REGULAR_USER}}"> مستخدم عادى </option>
                                <option value="{{\App\User::ADMIN_USER}}"> مدير موقع</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> المدينة </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-institution"></i>
                            </span>
                            <input type="text" name="city" class="form-control" placeholder="من فضلك ادخل المدينة الخاصة بك "> </div>
                    </div>
                    </div>
                <div class="form-group">
                        <label> العنوان  </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-location-arrow"></i>
                            </span>
                            <input type="text" name="address" class="form-control" placeholder="من فضلك ادخل العنوان الخاصة بك "> </div>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn blue">حفظ</button>
                </div>

                </div>
            </form>
        </div>
    </div>

@endsection
