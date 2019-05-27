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
                <th class="numeric">المدينة</th>
                <th> تعديل</th>
                <th> حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td> {{$branch->id}} </td>
                    <td>
                         {{$branch->name}}
                    </td>
                    <td> {{$branch->city}} </td>


                    <td><a href="{{route('branches.edit',$branch->id)}}"  class="btn blue">تعديل</a></td>
                    <td>
                        <form action="{{route('branches.destroy',$branch->id)}}" method="post">
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
