@extends('layout')

@section('title')Докладніше@endsection

@section('main_content')
    @foreach($access as $el)
        <div class="container my-5">
            <div class="row">
                <div class="col-md-4">
                    <img src="data:image/png;base64,{{ chunk_split(base64_encode($el->image)) }}">
                </div>
                <div class="text-justify col-md-8">
                    <h3>{{$el->name}}</h3>
                    <h4 style="color:#d22c2c;"> {{$el->price}} грн
                        <small style="float: right">@if($el->count<=0)
                                <span style="color: darkred"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>Немає в наявності</span>
                            @else
                                <span style="color: #2a9055"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
</svg>В наявності</span>
                            @endif
                        </small> </h4>
                    <h5>Тип:<small>{{$el->type}}</small></h5>
                    <h5>Країна:<small>{{$el->country}}</small></h5>
                    <form method="post" action="{{route('addToBasketAccess',['id'=>$el->id])}}" >
                        @csrf
                        <span>Кількість:</span>
                        <input type="number" name="Count" value="1" style="width: 11%" min="1" max="{{$el->count}}">
                        <input id="myB" type="submit" class="btn btn-danger" role="button" value="У Кошик">
                    </form>
                </div>
            </div>
        </div>
        <script>
                @if($el->count<=0)  {
                document.getElementById("myB").disabled = true;
            }
            @endif
        </script>
    @endforeach
@endsection
