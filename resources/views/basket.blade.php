@extends('layouts.app')



@section('content')
@if (!empty($basket[0]))
    <div class="m-table" style="background-color:whitesmoke; width:max-content;   text-align: center;">
       
            
        <table class="table" style="margin: auto; ">
            <thead  class='thead-dark'>
                <tr>
                    <th></th>
                    <th>
                        Название
                    </th>

                    <th>
                        Цена за единицу  
                    </th>

                    <th >
                    </th>
                    <th>
                        Количество
                    </th>
                    <th></th>
                    <th >
                        <a class='btn-lg btn-primary' href="{{ route('basket.pay') }}"  onclick='return confirm("Вы уверены что хотите оплатить товар?");' > Оплатить</a>
                    </th>
                </tr>
            </thead>



            <tbody>
                @foreach ($basket as $node)
                    <tr>
                        <td></td>
                        <td>
                            {{ $node->product_name }}
                        </td>
                        <td>
                            {{ $node->product_price }} $

                        </td>


                    <td><a class="btn btn-sm btn-outline-dark" href="{{ route('basket.decrease',['product'=>$node]) }}"><<<</a></td>
                        <td>
                            {{ $node->quantity }}
                        </td>
                        <td><a class="btn btn-sm btn-outline-dark" href="{{ route('basket.increase',['product'=>$node]) }}">>>></a></td>
                        <td><a class='btn btn-outline-danger' href="{{ route('basket.delete',['product'=>$node]) }}" onclick='return confirm("Вы уверены что хотите убрать товар из корзины?");'>Убрать из корзины</a></td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td style="font-size: 20px">К оплате: {{ $totalPrice }} $ <td>
                    <td></td>
                    
                    <td><a class='btn-lg btn-primary' href="{{ route('basket.pay') }}" onclick='return confirm("Вы уверены что хотите оплатить товар?");'> Оплатить</a></td>
                    <td></td>
                    <td><a class='btn btn-success' href={{ route('main.index') }}>Вернуться к покупкам</a></td>
                </tr>
            </tbody>
        </table>
        
        @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card " style="margin:auto; width: 25%; text-align:center;">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        
                            {{ __('В данный момент корзина пуста ') }}
                            <a class='btn btn-success' href={{ route('main.index') }}>Вернуться к покупкам</a>
    
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div> 

@endsection