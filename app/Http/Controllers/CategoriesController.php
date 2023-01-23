<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoriesController extends Controller
{
    use CategoriesTrait;

    public function index(): View
    {
       
        return \view('categories.index', [
            'categories' => $this->getCategories()
        ]);
    }

}
