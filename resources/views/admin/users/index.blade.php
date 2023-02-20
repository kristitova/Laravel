@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список Пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @forelse($usersList as $user)
                <tr>

                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('admin.users.edit', ['user' => $user]) }}">Изм.</a> &nbsp;
                    
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