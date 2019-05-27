@extends('layouts.app')

@section('page-title')
    <h1 class="page-title"> لوحة التحكم
        <small>عرض جميع الاعضاء</small>
    </h1>
@endsection

@section('content')
    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
            <tr>
                <th width="20%"> م</th>
                <th> الاسم</th>
                <th class="numeric">  المدينة </th>
                <th class="numeric"> العنوان </th>
                <th class="numeric"> المبلغ الاجمالى </th>
                <th class="numeric"> حالة الطلب</th>
                <th class="numeric"> كود الخصم</th>
                <th class="numeric">  اسم المستخدم </th>
                <th class="numeric">  رقم الجوال  </th>
                <th> المحتويات </th>
            </tr>
            </thead>
            <tbody>

            @foreach($requests as $request)

                <tr>
                    <td> {{$request->id}} </td>
                    <td>
                        <a href="{{url('/adminpanel/requests/'.$request->id.'/orders')}}" > {{$request->name}} </a>
                    </td>
                    <td> {{$request->city}} </td>
                    <td> {{$request->address}} </td>
                    <td>
                        {{$request->subtotal}}
                    </td>
                    <td> {{requestStatus($request->id)}} </td>
                    <td> @if($request->code_id != ''){{$request->code->name}}@endif </td>
                    <td> {{$request->user->name}} </td>
                    <td> {{$request->user->phone}} </td>

                    <td>

                        <a href="{{url('/adminpanel/requests/'.$request->id.'/orders')}}" type="submit" class="btn blue">عرض المحتويات</a>

                    </td>

                </tr>
            @endforeach


            </tbody>
        </table>
        {{$requests->appends(Request::input())->links()}}    </div>
@endsection
