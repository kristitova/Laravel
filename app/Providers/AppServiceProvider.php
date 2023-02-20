<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\ResourcesQueryBuilder;
use App\QueryBuilders\UsersQueryBuilder;
use App\Services\ParserService;
use App\Services\Contracts\Parser;
use App\Services\SocialService;
use App\Services\Contracts\Social;
use Illuminate\Pagination\Paginator;
use App\Services\UploadService;

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
        //Services
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(UploadService::class);
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
