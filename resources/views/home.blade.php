@extends('layout')

@section('title')Кабінет@endsection

@section('main_content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Кабінет користувача {{Auth::user()->name}} Пошта: {{Auth::user()->email}}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>{{ __('Мої замовлення') }}</h4><br>
                        @if($towars != NULL)
                        <div>
                            @foreach($towars as $t)
                                <table class="table">
                                    <tr>
                                        <th scope="col">Назва</th>
                                        <th scope="col">Кількість</th>
                                        <th scope="col">Ціна</th>
                                    </tr>
                                    <tbody>
                                    @foreach($t['wines'] as $w)
                                        <tr>
                                            <td>{{$w->name}}</td>
                                            <td>{{$w->bcount}}</td>
                                            <td>{{$w->bcount * $w->price}}</td>
                                        </tr>
                                    @endforeach

                                    @foreach($t['access'] as $a)
                                        <tr>
                                            <td>{{$a->name}}</td>
                                            <td>{{$a->bcount}}</td>
                                            <td>{{$a->bcount * $a->price}}</td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                        @else
                            <div class="text-center">
                                <h5>Замовлень немає</h5>
                            </div>
                        @endif
                        <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <button class="btn btn-danger" style="float: right;">Вихід</button>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" >
                                @csrf
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
