@extends('layouts.app')

@section('mnav')
<a class=" btn-sm mnav-btn btn-primary" href="{{ route('home') }}">Вернуться к учетной записи</a>

<a class="btn-sm mnav-btn btn-primary" href={{ route("store.index") }}>Перейти в магазин</a>

@endsection
@section('content')
    <div class="cotainer" style="margin:auto ;width: 70%;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Продукт :') }}</div>
    
                    <div class="card-body" style="align-content: center; padding: 10px;">
                    <form method="POST" action="{{ route('store.product.edit.post',['store'=>$store,'product'=>$product]) }}" onsubmit='return confirm("Вы уверены что хотите изменить товар?");'>
                            @csrf
                            @method('POST')
                
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left" style="margin-left:5px">{{ __('Название продукта :') }}</label>
                
                                <div class="col-md-6">
                                <input id="name" value='{{$product->name}}' type="text" class="form-control @error('name') is-invalid @enderror" name="name" required >
                
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-left" style="margin-left:5px">{{ __('Описние продукта :') }}</label>
                
                                <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" style="resize: none" required>{{ $product->description }}</textarea> 
                
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-left" style="margin-left:5px">{{ __('Цена :') }}</label>
                
                                <div class="col-md-6">
                                <input id="price" value="{{ $product->price }}" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required >
                
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-left" style="margin-left:5px">{{ __('Количество :') }}</label>
                
                                <div class="col-md-6">
                                <input id="quantity" value="{{ $product->quantity }}" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" required >
                
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success" style="margin: auto;">
                                    {{ __('Изменить товар') }}
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection