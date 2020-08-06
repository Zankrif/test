@extends('layouts.app')

@section('mnav')
<a class=" btn-sm mnav-btn btn-primary" href="{{ route('home') }}">Вернуться к учетной записи</a>
<a class=" btn-sm mnav-btn btn-primary" href="{{ route('product.add.index',['store'=>$store]) }}">Добаить товар в магазин</a>
<a class=" btn-sm mnav-btn btn-primary" href="{{ route('store.products.index',['store'=>$store]) }}">Просмтореть товары в магазине</a>
@endsection

@section('content')
<div class="container">
    <div class = 'form-bg'>
        <form action="{{ route('store.post',['store'=>$store])}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Название магазина</label>

             <input class="form-control" id="name" aria-describedby="nameHelp" value="{{ $store->store_name }}" name="name" required>
                <small id="nameHelp" class="form-text text-muted">Название магазниа отображается покупателям</small>
            </div>
            <button class="btn btn-primary" style="text-align: center" type="submit">Обновить</button>
        </form>
    </div>
</div>
@endsection