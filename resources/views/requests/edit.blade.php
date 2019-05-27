@extends('layouts.app')

@section('page-title')
    <h1 class="page-title">  لوحة التحكم
        <small>تعديل بيانات</small>
    </h1>
@endsection

@section('content')


    {{--
            `name`, `email`, `phone`, `password`, `api_token`, `role`, `status`, `city`, `address`, `verify`
    --}}
    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">

            <form role="form" action="{{route('users.update',$user->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="form-group">
                        <label>اسم المستخدم</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}"> </div>
                    </div>
                    <div class="form-group">
                        <label>البريد الالكتروني</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-envelope"></i>
                            </span>
                            <input type="text" name="email" class="form-control" value="{{$user->email}}"> </div>
                    </div>
                    <div class="form-group">
                        <label> رقم المحمول </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </span>
                            <input type="text" name="phone" class="form-control" value="{{$user->phone}}"> </div>
                    </div>

                    <div class="form-group">
                        <label>اختر الصلاحية </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-unlock"></i>
                            </span>
                            <select name="role" class="form-control">
                                <option value="{{\App\User::REGULAR_USER}}" @if($user->role == \App\User::REGULAR_USER) selected @endif> مستخدم عادى </option>
                                <option value="{{\App\User::ADMIN_USER}}" @if($user->role == \App\User::ADMIN_USER) selected @endif> مدير موقع</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> المدينة </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-institution"></i>
                            </span>
                            <input type="text" name="city" class="form-control" value="{{$user->city}}"> </div>
                    </div>
                    </div>
                <div class="form-group">
                        <label> العنوان  </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-location-arrow"></i>
                            </span>
                            <input type="text" name="address" class="form-control" value="{{$user->a}}"> </div>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn blue">حفظ</button>
                </div>

                </div>
            </form>
        </div>
    </div>

@endsection
