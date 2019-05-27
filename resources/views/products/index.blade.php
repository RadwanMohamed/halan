@extends('layouts.app')

@section('page-title')
    <h1 class="page-title"> لوحة التحكم
        <small>عرض جميع المنتجات</small>
    </h1>
@endsection

@section('content')
    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
            <tr>
                <th width="20%"> م</th>
                <th class="numeric"> الاسم بالعربي </th>
                <th class="numeric"> الاسم بالانجليزي</th>
                <th class="numeric"> الصورة</th>
                <th class="numeric"> الوصف بالعربي </th>
                <th class="numeric"> الوصف بالانجليزي</th>
                <th class="numeric"> الكمية  </th>
                <th class="numeric"> السعر  </th>
                <th class="numeric"> تصنيف المنتج </th>
                <th> تعديل</th>
                <th> حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td> {{$product->id}} </td>
                    <td> {{$product->name_ar}} </td>
                    <td> {{$product->name_en}} </td>
                    <td>
                        <img class="rounded" style="height: 50px; width: 50px;"  src="{{Request::root()}}/img/{{$product->photo1}}">
                    </td>
                    <td> {{$product->description_ar}} </td>
                    <td> {{$product->description_en}} </td>
                    <td> {{$product->quantity}} </td>
                    <td> {{$product->price}} </td>
                    <td> {{$product->category->name_ar}} </td>

                    <td>

                        <a href="{{route('products.edit',$product->id)}}" type="submit" class="btn blue">تعديل</a>

                    </td>
                    <td>
                        <form action="{{route('products.destroy',$product->id)}}" method="post">
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
