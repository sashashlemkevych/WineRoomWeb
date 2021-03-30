@extends('layout')

@section('title')Додавання Аксесуарів@endsection

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

    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="name" placeholder="Назва" class="form-control"><br>
        <input type="text" name="price" id="price" placeholder="Ціну" class="form-control"><br>
        <label for="type">Тип</label>
        <select name="type" id="type" class="form-control" style="width: 150px">
            <option value="1">Бокал</option>
            <option value="2">Декантер</option>
            <option value="3">Упаковка</option>
        </select><br>
        <input type="text" name="country" id="country" placeholder="Країна" class="form-control"><br>
        <input type="text" name="volume" id="volume" placeholder="Об'єм" class="form-control"><br>
        <input type="text" name="count" id="count" placeholder="Кількість" class="form-control"><br>
        <p>Добавлення картинки</p>
        <input type="file" name="image"><br><br>
        <button type="submit" class="btn btn-success">Додати</button>

    </form>

    <script>

    </script>

@endsection
