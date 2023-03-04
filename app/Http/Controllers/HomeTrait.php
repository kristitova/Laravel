<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait HomeTrait
{
    public function getHomeText() :string
    {
        $text='Добро пожаловать на новостной портал';

        return $text;
        
    }

    
}