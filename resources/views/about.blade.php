@extends('layout')
@section('title')Про нас@endsection
@section('main_content')
    <h1 class="display-3">WineRoom</h1>
    <p class="lead mb-0">Якщо ти хоч раз серйозно зацікавився вином, то рано чи пізно, приходить бажання самому його робити.
        Саме така пристрасть і призвела до створення виноробні Бейкуш.
        Втім, щоб робити велике вино, самої тільки пристрасті недостатньо, тож ми приєднали науку — вивчили ґрунт, клімат, опади, температури, напрямок вітру.
        Після цього підібрали оптимальні сорти, спланували посадку, розбили виноградник, довго експериментували та через кілька років вийшли на ринок зі своїми винами.</p>



    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="about/check">
        @csrf
        <footer class="my-5 pt-5 text-muted text-center text-small">
        <div class="container">
        <h3 style="color: black">Контакти</h3>
        <p style="color: black">Будемо раді відповісти  на ваші запитання</p>
        <input type="text" name="name" id="name" placeholder="Ім'я" class="form-control"><br>
        <input type="text" name="phone" id="phone" placeholder="Телефон" class="form-control"><br>
        <input type="email" name="email" id="email" placeholder="Пошта" class="form-control"><br>
        <textarea name="massage" placeholder="Повідомлення" class="form-control"></textarea><br>
        <button type="submit" class="btn btn-danger">Відправити</button>
        </div>
        </footer>
    </form>
@endsection
