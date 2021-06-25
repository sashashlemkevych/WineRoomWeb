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
                                @foreach($t['wines'] as $w)
                                    {{$w->name}}
                                @endforeach

                                @foreach($t['access'] as $a)
                                    <p>{{$a->name}}</p>
                                    @endforeach

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
