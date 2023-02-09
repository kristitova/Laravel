<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\OrdersController as AdminOrdersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Admin Routes

Route::group(['prefix'=> 'admin', 'as' => 'admin.'], static function() {
    Route::get('/', AdminIndexController::class)
    ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('users', AdminUsersController::class);
    Route::resource('orders', AdminOrdersController::class);
});

Route::group(['prefix'=> ''], static function() {

    Route::get('/hello/{name}', static function(string $name): string {
        return "Hello, {$name}";
    });

    Route::get('/info', static function(): string {
        return "Some info";
    });

    

    
    Route::get('/news/{category_id}', [NewsController::class, 'index'])
        ->where( 'category_id', '\d+')
        ->name('news.category');

    Route::get('/news/{id}/show', [NewsController::class,'show'])
        ->where( 'id', '\d+')
        ->name('news.show');

    Route::get('/categories', [CategoriesController::class, 'index'])
        ->name('categories');
    

    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');


});

Route::get('collection', function() {
    $names = ['names' => ['Ann', 'Billy', 'Sam', 'Jhon', 'Andy', 'Feeby', 'Edd', 'Jil', 'Jeck', 'Freddy']];
   $collection = collect([
        ['product' => 'Desk', 'price' => 200],
        ['product' => 'Chair', 'price' => 100],
        ['product' => 'Bookcase', 'price' => 150],
        ['product' => 'Door', 'price' => 100],
    ]);

    $collect = \collect($names);

    dd($collection->where('price', 100)->toJson());

    dd($collect->toJson());
});