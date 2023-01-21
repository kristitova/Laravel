<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HomeTrait;
    public function index()
    {
       
        return view('home.index',  [
            'text' => $this->getHomeText()
        ]);
    }

    public function show() 
    {
        return $this->getHomeText();
    }

}
