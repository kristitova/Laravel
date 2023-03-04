@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать ресурс</h1>
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
        <form method="post" action="{{ route('admin.resources.update', ['resources'=> $resources]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="caption">Название ресурса</label>
                <input type="text" id="caption" name="caption" value="{{ $resources->caption }}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="category_id">ID категории</label>
                <input type="text" id="category_id" name="category_id" value="{{ $resources->category_id }}" class="form-control"/>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>

@endsection