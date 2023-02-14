<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\ResourcesQueryBuilder;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {   
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, ResourcesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, UsersQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        
        Paginator::useBootstrapFour();
    }
}
