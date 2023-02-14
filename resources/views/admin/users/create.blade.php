@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Форма обратной связи</h1>
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
        <form method="post" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="form-group">
                <label for="username">Пользователь</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="review">Отзыв</label>
                <textarea class="form-control" id="review" name="review">{{ old('review') }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>

@endsection