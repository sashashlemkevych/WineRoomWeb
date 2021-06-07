@extends('layout')

@section('title')Контакти@endsection

@section('main_content')
    <h1>Повідомлення користувачів</h1>
        @foreach($abouts as $el)
                    <div class="alert alert-danger">
                        <h3>{{$el->massage}}</h3>
                        <b>{{$el->name}}</b>
                        <h5><small>{{$el->phone}}</small></h5>
                        <h5><small>{{$el->email}}</small></h5>
                        <a href="{{route('deleteContact',[$el->id])}}" class="btn btn-danger p-2">Видалити</a>
                    </div>
                @endforeach
@endsection
