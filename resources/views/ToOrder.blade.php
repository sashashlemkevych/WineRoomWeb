@extends('layout')

@section('title')Замовлення@endsection

@section('main_content')
    <h1 class="mb-4">Оформити заказ</h1>
    <form method="post" action="{{route('orderview')}}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="PIB" placeholder="ПІП"
                   required maxlength="255">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Пошта"
                   required maxlength="255">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Номер телефона"
                   required maxlength="255">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Адреса доставки"
                   required maxlength="255">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Оформити</button>
        </div>
    </form>
@endsection
