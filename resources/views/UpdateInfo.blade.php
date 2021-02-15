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
    <form method="post" action="{{route('UpdateWine',[$el->id])}}" enctype="multipart/form-data">
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
            <label for="type">Тип</label>
            <input type="text" class="form-control" value="{{$el->type}}" name="type" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="storage">Склад</label>
            <input type="text" class="form-control" value="{{$el->storage}}" name="storage" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="vol">Міцність</label>
            <input type="text" class="form-control" value="{{$el->vol}}" name="vol" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="eat">Їжа</label>
            <input type="text" class="form-control" value="{{$el->eat}}" name="eat" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="temperature">Температура подачі</label>
            <input type="text" class="form-control" value="{{$el->temperature}}" name="temperature" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="short_description">Коротки опис</label>
            <input type="text" class="form-control" value="{{$el->short_description}}" name="short_description" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="count">Кількість</label>
            <input type="text" class="form-control" value="{{$el->count}}" name="count" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="description">Опис</label>
            <textarea class="form-control" name="description" rows="5">{{$el->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Картинка</label>
            <input type="file" class="form-control-file" name="image">
        </div>
            <button type="submit" class="btn btn-primary p-2">Оновити</button>
            <a href="{{route('deleteWine',[$el->id])}}" class="btn btn-danger p-2">Видалити</a>

    </form>

    </div>
@endsection
