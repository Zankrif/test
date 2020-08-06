@extends('layouts.app')
@section('mnav')
<form action="{{ route('main.search') }}" method="POST">
@csrf
@method('POST')
    <input type="text" name='value' placeholder='Что ищем?'>
    <label>Где ищем?</label>
    <label for="brand">В Брендах </label>
    <input id='brand' type="radio" class="custom-radio" name='type' value='1'>
    <label for="category">В категориях</label>
    <input id='category' type="radio" class="custom-radio" name='type' value='2'>
    <button class="btn btn-outline-success" style="margin:auto">Поиск!</button>
</form>
@endsection
@section('content')




                        
    </div>
    @if (!empty($products))
    <div class='products' >
        @foreach ($products as $product)

                <div class = "product">
                    <h3>
                        {{ $product->name }}
                    </h3>
                    <h4>
                        Цена : {{ $product->price }}
                    </h4>
                    <p style="margin: 10px;text-align: left">
                        {{mb_strimwidth ($product->description,0,100,'....')  }}
                    </p>
                <a class="btn-sm btn-primary" href='{{ route('main.brand',['brand'=>$product->brand[0]->id]) }}'>{{ $product->brand[0]->name }}</a>
                <a class="btn-sm btn-primary" href='{{ route('main.category',['category'=>$product->category[0]->id]) }}'>{{ $product->category[0]->name }}</a>
                <a class='btn btn-lg btn-outline-success' style="margin-top: 5px" href="{{ route('add.to.basket',['product'=>$product]) }}">Добавить в коризну</a>
            </div>

        @endforeach
    </div>
 
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card " style="margin:auto; width: 30%">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                        {{ __('В данный момент нету товаров') }}

                </div>
            </div>
        </div>
    </div>

    @endif
@endsection