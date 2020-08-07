@extends('layouts.app')

@section('mnav')
<a class=" btn-sm mnav-btn btn-primary" href="{{ route('home') }}">Вернуться к учетной записи</a>
<a class="btn-sm mnav-btn btn-primary" href="{{ route('store.create.index') }}">Создать еще один магазин</a>

@endsection

@section('content')
<div class="container">
    <div class = 'form-bg'>
        @foreach ($stores as $store)
        
        <form style="margin-bottom:5px" action="{{ route('store.post',['store'=>$store])}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Название магазина</label>

             <input class="form-control" id="name" aria-describedby="nameHelp" value="{{ $store->store_name }}" name="name" required>
                <small id="nameHelp" class="form-text text-muted">Название магазниа отображается покупателям</small>
            </div>
            <button class="btn-sm btn-primary" style="text-align: center" type="submit">Обновить</button>
            <a class=" btn-sm mnav-btn btn-primary" href="{{ route('product.add.index',['store'=>$store]) }}">Добаить товар в магазин</a>
            <a class=" btn-sm mnav-btn btn-primary" href="{{ route('store.products.index',['store'=>$store]) }}">Просмтореть товары в магазине</a>
        </form>
        
        @endforeach
        <div class='mnav'>
            {{ $stores->links() }}
        </div>
    
    </div>
</div>
@endsection