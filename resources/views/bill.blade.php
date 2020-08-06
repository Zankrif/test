@extends('layouts.app')

   
    @section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        @if ($type == true)
                                {{ __('Покупка успешно завершена') }}

                        @else
                      
                            {{ __('Товар больше не доступен в таком количестве либо отсутсвтует') }}
                    <a class="btn btn-lg btn-outline-success" href="{{ route('basket.index' )}}">Вернуться к корзине, для оплаты доступных товаров</a>

                        @endif    
    
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection


