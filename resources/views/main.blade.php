@extends('layouts.app')
@section('content')
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
                <a class="btn-sm btn-primary" href='#'>{{ $product->category }}</a>
                <a class="btn-sm btn-primary" href='#'>{{ $product->brand }}</a>
                <a class='btn btn-lg btn-outline-success' style="margin-top: 5px" href="{{ route('add.to.basket',['product'=>$product]) }}">Добавить в коризну</a>
            </div>

        @endforeach
    </div>
    <div class="mnav" style="margin:auto; text-aligin:center;">
        {{$products->links()}}   
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