<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Resources;

final class ResourcesQueryBuilder extends QueryBuilder
{
    private Builder $model;
   
    public function __constract()
    {
        $this->model = Resources::query();
    }

    public function getAll(): Collection
    {
        return Resources::query()->get();
    }
}