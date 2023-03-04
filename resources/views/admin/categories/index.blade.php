@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список Категорий</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Категория</th>
                    <th>Описание</th>
                </tr>
            </thead>
            <tbody>
            @forelse($categoriesList as $categories)
                <tr>

                    <td>{{ $categories->id }}</td>
                    <td>{{ $categories->title }}</td>
                    <td>{{ $categories->description }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection