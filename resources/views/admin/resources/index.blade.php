@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список Ресурсов</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Название ресурса</th>
                    <th>ID категории</th>
                </tr>
            </thead>
            <tbody>
            @forelse($resourcesList as $resources)
                <tr>

                    <td>{{ $resources->id }}</td>
                    <td>{{ $resources->caption }}</td>
                    <td>{{ $resources->category_id }}</td>                    
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