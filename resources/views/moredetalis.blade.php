@extends('layout')

@section('title')Докладніше@endsection

@section('main_content')
    @foreach($mains as $el)
        <div class="container my-5">
            <div class="row">
                <div class="col-md-4">
                    <img src="data:image/png;base64,{{ chunk_split(base64_encode($el->image)) }}">
                </div>
            <div class="text-justify col-md-8">
                <h3>{{$el->name}}</h3>
                <h4><small>{{$el->short_description}}.</small></h4>
                <h4 style="color:#d22c2c;"> {{$el->price}} грн</h4>
                <h5>Опис</h5>
                <h5><small>{{$el->description}}</small></h5>
                <h5>Країна:<small>{{$el->country}}</small></h5>
                <h5>{{$el->type}}</h5>
                <h5>Виноград:<small>{{$el->storage}}</small></h5>
                <h5>Міцність:<small>{{$el->strength}}</small></h5>
                <h5>Їжа:<small>{{$el->eat}}</small></h5>
                <h5>Температура подачі:<small>{{$el->temperature}}</small></h5>
                <h5>Об'єм:<small>{{$el->volume}}</small></h5>
                <form method="post" action="{{route('addToBasket',['id'=>$el->id])}}" >
                    @csrf
                <span>Кількість:</span>
                <input type="number" name="Count" value="1" style="width: 11%" min="1" max="{{$el->count}}">
                <input type="submit" class="btn btn-danger" role="button" value="У Кошик">
                </form>
            </div>
        </div>
        </div>
    @endforeach
@endsection
