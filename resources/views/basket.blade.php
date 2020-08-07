@extends('layouts.app')
@section('content')
    <div class='basket'>
        <div class='basket-header'>
            Корзина:
            <a class="btn close" href="{{ route('main.index') }}" aria-label="Close">&times;</a>

        </div>
        @if (!empty($basket[0]))
        @foreach ($basket as $node)
        <div class="basket-product">
            <h5 class="basket-product-header">  {{ $node->product_name }}</h5>
            <p class="basket-product-sm-description" style="text-align: left"> {{mb_strimwidth ($node->product_description,0,120,'....')  }}</p>
            <div style="display:inline-flex; padding: 0 10px;float:right">
                <a class="btn btn-circle btn-outline-secondary" href="{{ route('basket.decrease',['product'=>$node]) }}">-</a>
                 <label class="product-label" >{{ $node->quantity }}</label>
            <a id='s' class="btn btn-circle btn-outline-secondary" href=" {{ route('basket.increase',['product'=>$node]) }} ">+</a>
            <label class="product-label" >{{ $node->product_price }} $</label>
            <i class="fas fa-trash"></i>
            <a class=" btn  btn-outline-secondary  btn-circle" href="{{ route('basket.delete',['product'=>$node]) }}" onclick='return confirm("Вы уверены что хотите убрать товар из корзины?");'>&times</a>
           
            </div>
         </div>

         @endforeach
         <div class="buy">
             <a class="btn btn-outline-primary" style="margin-top: 2px" href="{{ route('main.index') }}">Продолжить покупки</a>
            <div class="buy-form">
                <div class="buy-form-inside">
                    <label class="product-label">К оплате {{ $totalPrice }} $</label>
                    
                </div> 
                <a class=" btn  btn-outline-success  btn-circle" style="font-size: 1.5rem; line-height: 0.8;"href="{{ route('basket.pay') }}" onclick='return confirm("Вы уверены что хотите оплатить товар?");'>$</a>
            </div>
         </div> 
         {{$basket->links()}}
        @else
        <div class="basket-product">
            <label class="product-label" style="float:none; text-align: center" > Корзина пустая </label>
        </div>
        @endif
    </div>
@endsection