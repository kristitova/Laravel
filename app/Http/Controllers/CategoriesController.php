<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use CategoriesTrait;

    public function index()
    {
       
        return \view('categories.index', [
            'categories' => $this->getCategories()
        ]);
    }

}
