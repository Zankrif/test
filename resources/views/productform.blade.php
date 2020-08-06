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
                    <form method="POST" action="{{ route('product.add.post',['store'=>$store]) }}">
                            @csrf
                            @method('POST')
                
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left" style="margin-left:5px">{{ __('Название продукта :') }}</label>
                
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required >
                
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-left" style="margin-left:5px">{{ __('Категория :') }}</label>
                
                                <div class="col-md-6">
                                    <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" required >
                
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brand" class="col-md-4 col-form-label text-md-left" style="margin-left:5px">{{ __('Название бренда :') }}</label>
                
                                <div class="col-md-6">
                                    <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" required >
                
                                    @error('brand')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-left" style="margin-left:5px">{{ __('Описние продукта :') }}</label>
                
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description"  rows="10" style="resize: auto" required></textarea> 
                
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
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required >
                
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
                                    <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" required >
                
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin: auto;">
                                    {{ __('Добавить товар') }}
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