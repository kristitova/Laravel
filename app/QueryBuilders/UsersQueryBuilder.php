<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

final class UsersQueryBuilder extends QueryBuilder
{
    private Builder $model;
   
    public function __constract()
    {
        $this->model = User::query();
    }

    public function getAll(): Collection
    {
        return User::query()->get();
    }

    //<!--<td><a href="{{ route('admin.users.edit', ['users' => $users]) }}">Изм.</a></td>-->
}