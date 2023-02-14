<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;

final class CategoriesQueryBuilder extends QueryBuilder
{
    private Builder $model;
   
    public function __constract()
    {
        $this->model = Category::query();
    }

    public function getAll(): Collection
    {
        return Category::query()->get();
    }
}