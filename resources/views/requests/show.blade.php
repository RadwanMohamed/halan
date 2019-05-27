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
                <th class="numeric">  التقطيع </th>
                <th class="numeric"> الحجم </th>
                <th class="numeric"> الحالة </th>
                <th class="numeric"> السعر </th>
                <th class="numeric"> الكمية </th>
                <th class="numeric"> الاجمالى</th>
                <th class="numeric">  اسم المستخدم </th>
                <th colspan="3"> تعديل الحالة  </th>
            </tr>
            </thead>
            <tbody>

            @foreach($orders as $order)

                <tr>
                    <td> {{$order->id}} </td>
                    <td>
                         {{$order->name}}
                    </td>
                    <td> {{$order->cutter_kind}} </td>
                    <td> {{$order->size}} </td>

                    <td> {{orderStatus($order->status)}} </td>
                    <td>
                        {{$order->price}}
                    </td>
                    <td>
                        {{$order->quantity}}
                    </td>
                    <td>
                        {{$order->subtotal}}
                    </td>
                    <td>
                        {{$request->user->name}}
                    </td>

                    <td>

                    <form action="{{route("orders.update",$order->id)}}" method="post">
                        @csrf
                        @method('put')
                        <select name="status">
                            <option value="{{\App\Order::PROCESSING}}">جاري التحضير</option>
                            <option value="{{\App\Order::DELIVERED}}">منتهي</option>
                        </select>
                        <button > تعديل</button>
                    </form>
                    </td>


                </tr>
            @endforeach


            </tbody>
        </table>
@endsection
