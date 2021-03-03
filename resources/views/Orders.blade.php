@extends('layout')

@section('title')Замовлення@endsection

@section('main_content')
    @isset($orders)
        @if($orders != NULL)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ПІБ</th>
                    <th scope="col">Пошта</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Адреса</th>
                    <th scope="col">Товар</th>
                    <th scope="col">Кількість</th>
                    <th scope="col">Ціна</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $I=>$el)
                    <tr>
                        <th scope="row">{{$I+1}}</th>
                        <td>{{$el->PIB}}</td>
                        <td>{{$el->email}}</td>
                        <td>{{$el->phone}}</td>
                        <td>{{$el->address}}</td>
                        <td>{{$el->name}}</td>
                        <td>1</td>
                        <td>{{$el->price}}</td>
                        <td><a href="{{route('deleteOrders',[$el->oid])}}" class="btn btn-outline-danger">Видалити</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center">
                <h3>Замовлень немає</h3>
                <a href="{{route('main')}}" class="btn btn-outline-danger">Повернутися на головну</a>
            </div>
        @endif
    @endisset
@endsection
