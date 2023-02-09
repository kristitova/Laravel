<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Orders;

final class OrdersQueryBuilder extends QueryBuilder
{
    private Builder $model;
   
    public function __constract()
    {
        $this->model = Orders::query();
    }

    public function getAll(): Collection
    {
        return Orders::query()->get();
    }
}