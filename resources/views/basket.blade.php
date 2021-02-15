@extends('layout')

@section('title')Корзина@endsection

@section('main_content')
    @isset($wines)
        @if($wines != NULL)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Картинка</th>
                <th scope="col">Назва</th>
                <th scope="col">Ціна</th>
                <th scope="col">Кількість</th>
                <th scope="col">Загальна ціна</th>
            </tr>
            </thead>
                    <tbody>
                    @foreach($wines as $I=>$el)
                    <tr>
                        <th scope="row">{{$I+1}}</th>
                        <td> <img src="data:image/png;base64,{{ chunk_split(base64_encode($el->image)) }}" style="width: 100px"></td>
                        <td>{{$el->name}}</td>
                        <td>{{$el->price}}</td>
                        <td>{{$el->bcount}}</td>
                        <td>{{$el->price*$el->bcount}}</td>
                        <td><a href="{{route('deleteBasket',[$el->id])}}" class="btn btn-outline-danger">Видалити</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
        <div style="width: 100%; text-align: right;" class="container">
            <div style="width: 50%; float: right;" class="p-1">
                <a class="btn btn-outline-success" href="{{route('ToOrder')}}">Оформити замовлення</a>
            </div>
        </div>
        @else
            <div class="text-center">
                <h3>Товарів в кошику немає</h3>
                <a href="{{route('main')}}" class="btn btn-outline-danger">Повернутися до товарів</a>
            </div>
        @endif
    @endisset
@endsection
