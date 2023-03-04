@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Форма заказа</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            
        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.orders.store') }}">
            @csrf
            <div class="form-group">
                <label for="username">Пользователь</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror"/>
            </div>
            <div class="form-group">
                <label for="telephone">Номер телефона</label>
                <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}" class="form-control @error('telephone') is-invalid @enderror"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"/>
            </div>
            <div class="form-group">
                <label for="product">Товары</label>
                <textarea class="form-control @error('product') is-invalid @enderror" id="product" name="product">{{ old('product') }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div> 

@endsection