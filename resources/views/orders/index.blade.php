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
                <th class="numeric"> البريد الالكتروني</th>
                <th class="numeric"> رقم المحمول</th>
                <th class="numeric"> الصلاحية</th>
                <th class="numeric"> حالة المستخدم</th>
                <th class="numeric"> المدينة</th>
                <th class="numeric"> العنوان</th>
                <th> حظر</th>
                <th> تعديل</th>
                <th> حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td> {{$user->id}} </td>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}" > {{$user->name}} </a>
                    </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->phone}} </td>
                    <td>
                        {{role($user->role)}}
                    </td>
                    <td> {{status($user->status)}} </td>
                    <td> {{$user->city}} </td>
                    <td> {{$user->address}} </td>
                    <td>
                        @if($user->status== \App\User::OFF)
                            <form action="{{url('/adminpanel/users/'.$user->id.'/activate')}}" method="post">
                                @csrf
                                <button type="submit" class="btn green"> تفعيل </button>
                            </form>
                        @else
                        <form action="{{url('/adminpanel/users/'.$user->id.'/block')}}" method="post">
                            @csrf
                            <button type="submit" class="btn "> حظر </button>
                        </form>
                        @endif

                    </td>

                    <td>

                        <a href="{{route('users.edit',$user->id)}}" type="submit" class="btn blue">تعديل</a>

                    </td>
                    <td>
                        <form action="{{route('users.destroy',$user->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn red"> حذف</button>
                        </form>

                    </td>

                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection
