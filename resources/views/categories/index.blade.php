@extends('layouts.app')

@section('page-title')
    <h1 class="page-title"> لوحة التحكم
        <small>عرض جميع الاصناف</small>
    </h1>
@endsection

@section('content')
    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
            <tr>
                <th width="20%"> م</th>
                <th class="numeric"> الاسم  </th>
                <th class="numeric"> الاسم بالانجليزي</th>
                <th class="numeric"> الصورة</th>
                <th class="numeric"> الوصف بالعربي </th>
                <th class="numeric"> الوصف بالانجليزي</th>
                <th> تعديل</th>
                <th> حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td> {{$category->id}} </td>
                    <td> {{$category->name_ar}} </td>
                    <td> {{$category->name_en}} </td>
                    <td>
                       <img class="rounded" style="height: 50px; width: 50px;"  src="{{Request::root()}}/{{$category->photo}}">
                    </td>
                    <td> {{$category->description_ar}} </td>
                    <td> {{$category->description_en}} </td>

                    <td>

                        <a href="{{route('categories.edit',$category->id)}}" type="submit" class="btn blue">تعديل</a>

                    </td>
                    <td>
                        <form action="{{route('categories.destroy',$category->id)}}" method="post">
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
