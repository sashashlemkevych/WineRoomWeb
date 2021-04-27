@extends('layout')

@section('title')Редагування@endsection

@section('main_content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('UpdateAccessoriesInfo',[$el->id])}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Назва</label>
                <input type="text" class="form-control" value="{{$el->name}}" name="name" placeholder=""required>
            </div>
            <div class="form-group">
                <label for="price">Ціна</label>
                <input type="text" class="form-control" value="{{$el->price}}" name="price" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="country">Країна</label>
                <input type="text" class="form-control" value="{{$el->country}}" name="country" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="type">Тип</label>
                <select name="type" id="type" class="form-control" value="{{$el->type}}"  style="width: 150px">
                    <option value="Декантер">Декантер</option>
                    <option value="Бокал">Бокал</option>
                    <option value="Упаковка">Упаковка</option>
                </select><br>
            </div>
            <div class="form-group">
                <label for="volume">Об'єм</label>
                <input type="text" class="form-control" value="{{$el->volume}}" name="volume" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="count">Кількість</label>
                <input type="text" class="form-control" value="{{$el->count}}" name="count" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="image">Картинка</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <button type="submit" class="btn btn-primary p-2">Оновити</button>
            <a href="{{route('deleteAccessories',[$el->id])}}" class="btn btn-danger p-2">Видалити</a>

        </form>

    </div>
@endsection
