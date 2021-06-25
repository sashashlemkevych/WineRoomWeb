@extends('layout')

@section('title')Замовлення@endsection

@section('main_content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    @isset($orders)
        @foreach($orders as $o)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne{{$o->uid}}" aria-expanded="true" aria-controls="collapseOne">
                            {{ $o->name }} Пошта замовника:{{ $o->email }}
                        </button>
                    </h2>
                </div>
                <div id="collapseOne{{$o->uid}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Товар</th>
                                <th scope="col">Кількість</th>
                                <th scope="col">Ціна</th>
                                <th scope="col">Дата</th>
                            </tr>
                            </thead>
                            @isset($towars[$o->uid])
                                <tbody>
                                    @foreach($towars[$o->uid]['wines'] as $w)
                                        <tr>
                                            <td>{{$w->name}}</a></td>
                                            <td>{{$w->bcount}}</a></td>
                                            <td>{{$w->price*$w->bcount}}</td>
                                            <td>{{$o->create_at}}</td>
                                        </tr>
                                    @endforeach

                                    @foreach($towars[$o->uid]['access'] as $a)
                                        <tr>
                                            <td>{{$a->name}}</a></td>
                                            <td>{{$a->bcount}}</a></td>
                                            <td>{{$a->price*$a->bcount}}</td>
                                            <td>{{$o->create_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <h2>Даних нема</h2>
                            @endisset
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
            @endisset
@endsection
