@extends('layouts.app')

@section('page-title')
    <h1 class="page-title"> لوحة التحكم
        <small> تعديل اعدادت الموقع </small>
    </h1>
@endsection

@section('content')


    {{--
            `name`, `email`, `phone`, `password`, `api_token`, `role`, `status`, `city`, `address`, `verify`
    --}}
    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">

            <form role="form" action="{{route('settings.store')}}" method="post">
                @csrf
                <div class="form-body">
                    @foreach($settings as $setting)
                    <div class="form-group">
                        <label>{{$setting->slug}}</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                               <i class="fa fa-pencil"></i>
                            </span>
                            <input type="text" name="{{$setting->name}}" class="form-control" value="{{$setting->value}}" >
                        </div>
                    </div>
                    @endforeach


                    @if(count($settings)>0)
                    <div class="form-actions">
                        <button type="submit" class="btn blue">حفظ</button>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

@endsection
