<?php
declare(strict_types=1);
namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\News;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsQueryBuilder extends QueryBuilder
{
    private Builder $model;
   
    public function  __constract()
    {
        $this->model=News::query();
    }

    public function getNewsByStatus(string $status): Collection
    {
        return News::query()->where('status', $status)->get();
    }

    public function getNewsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
       return News::query()->with('categories')->paginate($quantity);
    }

    public function getAll(): Collection
    {
        return News::query()->get();
    }
}