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

            <div class="portlet-body">
                <div id="chart_1" class="chart" style="height: 500px;"> </div>
            </div>

        </div>
    </div>

@endsection

