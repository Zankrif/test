@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class = 'form-bg'>
                <form action="{{ route('store.create.post')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Название магазина</label>
                        <input class="form-control" id="name" aria-describedby="nameHelp" name="name" required>
                        <small id="nameHelp" class="form-text text-muted">Название магазниа отображается покупателям</small>
                    </div>
                    <button class="btn btn-primary" style="text-align: center" type="submit">Создать</button>
                </form>
            </div>
        </div>
    @endsection