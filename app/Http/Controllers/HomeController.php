<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    use HomeTrait;
    public function index(): View
    {
       
        return view('home.index',  [
            'text' => $this->getHomeText()
        ]);
    }



}
