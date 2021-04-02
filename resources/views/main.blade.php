@extends('layout')

@section('title')Магазин@endsection

@section('main_content')

    <div class="container">
    @foreach($mains as $el)
            <div class="card" style="display: inline-block; width: 18rem; margin: 20px" >
                <img src="data:image/png;base64,{{ chunk_split(base64_encode($el->image)) }}" class="card-img-top">
                <div class="card-body">
                <h3>{{$el->name}}</h3>
                <p>{{\Illuminate\Support\Str::limit($el->short_description,45,"...")}}</p>
                <h5 class="card-title" style="color:#d22c2c;"> {{$el->price}} грн</h5>
                    <a class="btn btn-secondary" href="{{route("moredetalis_id",['id' => $el->id])}}" role="button">Докладніше</a>
                    @auth()
                        <a class="btn btn-danger" href="{{route('UpdateInfo',[$el->id])}}" role="button">Редагувати</a>
                    @endauth
            </div>
            </div>
    @endforeach
    </div>
@endsection

