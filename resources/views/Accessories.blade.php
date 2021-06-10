@extends('layout')

@section('title')Аксесуари@endsection

@section('main_content')
@if($access != NULL)
    <div class="container">
        @foreach($access as $el)
            <div class="card" style="display: inline-block; width: 20rem; margin: 15px;" >
                <img src="data:image/png;base64,{{ chunk_split(base64_encode($el->image)) }}" class="card-img-top">
                <div class="card-body">
                    <h3>{{$el->name}}</h3>
                    <h5 class="card-title" style="color:#d22c2c;"> {{$el->price}} грн</h5>
                    <a class="btn btn-secondary" href="{{route("moreAccessories_id",['id' => $el->id])}}" role="button">Докладніше</a>
                    @auth()
                        @isset($isadmin)
                            @if($isadmin)
                        <a class="btn btn-danger" href="{{route('UpdateAccessories',[$el->id])}}" role="button">Редагувати</a>
                            @endif
                        @endisset
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
    @else
        <div class="text-center">
            <h3>Даний товар відсутній</h3>
            <a href="{{route('main')}}" class="btn btn-outline-danger">Повернутися на головну</a>
        </div>
    @endif
@endsection
