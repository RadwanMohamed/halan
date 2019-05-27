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
                <th>  الاسم بالعربي </th>
                <th>  الاسم بالانجليزي </th>
                <th>  الوصف بالعربي </th>
                <th>  الوصف بالانجليزي </th>
                <th colspan="2">   </th>

            </tr>
            </thead>
            <tbody>
            @foreach($cutters as $cutter)
                <tr>
                    <td> {{$cutter->id}} </td>
                    <td>
                         {{$cutter->name_ar}}
                    </td>
                    <td>
                         {{$cutter->name_en}}
                    </td>
 <td>
                         {{$cutter->description_ar}}
                    </td>
                    <td>
                         {{$cutter->description_en}}
                    </td>


                    <td><a href="{{route('cutterkinds.edit',$cutter->id)}}"  class="btn blue">تعديل</a></td>
                    <td>
                        <form action="{{route('cutterkinds.destroy',$cutter->id)}}" method="post">
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
