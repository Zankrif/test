@extends('layouts.app')

@if(Auth::user()->role >= 2)
    @section('mnav')
        @if(!Auth::user()->store_created == true)
        <a class="btn btn-lg mnav-btn btn-primary" href={{ route("store.create.index") }}>Создать магазин</a>
        @else
        <a class="btn btn-lg mnav-btn btn-primary" href={{ route("store.index") }}>Перейти в магазин</a>
        @endif
    @endsection
    @else

    @section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

@endif


