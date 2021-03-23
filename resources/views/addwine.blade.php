@extends('layout')

@section('title')Добавлення@endsection

@section('main_content')
    <h1>Форма додавання</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

    <form method="post" action="/addwine/check" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="name" placeholder="Назва вина" class="form-control"><br>
        <input type="text" name="price" id="price" placeholder="Ціну" class="form-control"><br>
        <input type="text" name="type" id="type" placeholder="Тип вина" class="form-control"><br>
        <input type="text" name="country" id="country" placeholder="Країна" class="form-control"><br>
        <input type="text" name="storage" id="storage" placeholder="Склад" class="form-control"><br>
        <input type="text" name="strength" id="strength" placeholder="Міцність" class="form-control"><br>
        <input type="text" name="eat" id="eat" placeholder="Їжа" class="form-control"><br>
        <input type="text" name="temperature" id="temperature" placeholder="Температуру подачі" class="form-control"><br>
        <input type="text" name="volume" id="volume" placeholder="Об'єм" class="form-control"><br>
        <input type="text" name="short_description" id="short_description" placeholder="Короткий опис" class="form-control"><br>
        <input type="text" name="count" id="count" placeholder="Кількість" class="form-control"><br>
        <textarea name="description" placeholder="Опис вина" class="form-control"></textarea><br>
        <p>Добавлення картинки</p>
        <input type="file" name="image"><br><br>
        <button type="submit" class="btn btn-success">Додати</button>

    </form>


@endsection
