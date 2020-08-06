@extends('layouts.app')

@section('mnav')
<a class=" btn-sm mnav-btn btn-primary" href="{{ route('home') }}">Вернуться к учетной записи</a>
<a class=" btn-sm mnav-btn btn-primary" href="{{ route('product.add.index',['store'=>$store]) }}">Добаить товар в магазин</a>
<a class="btn-sm mnav-btn btn-primary" href={{ route("store.index") }}>Перейти в магазин</a>

@endsection

@section('content')
    <div class="m-table">
        @if (!empty($products[0]))
            
        <table class="table" style="margin: auto;">
            <thead  class='thead-dark'>
                <tr>
                    <th>
                        Категория
                    </th>
                    <th>
                        Бренд
                    </th>
                    <th>
                        Название
                    </th>
                    <th>
                        Описание
                    </th>
                    <th>
                        Цена
                    </th>
                    <th>
                        Количество
                    </th>
                    <th>
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>



            <tbody>
                @foreach ($products as $product)

                    <tr>
                        
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            {{ $product->description }}
                        </td>

                        <td>
                            {{ $product->price }}
                        </td>

                        <td>
                            {{ $product->quantity }}
                        </td>
                        <td>
                        <a class='btn btn-warning'  href="{{ route('store.product.edit.index',['store'=>$store,'product'=>$product]) }}">Редактировать</a>
                        </td>
                        <td>
                            <form method="DELETE" onsubmit='return confirm("Вы уверены что хотите удалить товар из магазина?");' action="{{ route('store.product.delete',['store'=>$store, 'id'=>$product->id]) }}" class="form-group">
                                @csrf
                                @method('DELETE')
                                <button class='btn btn-danger' type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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
    
    </div> 

@endsection