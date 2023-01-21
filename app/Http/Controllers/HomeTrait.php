<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait HomeTrait
{
    public function getHomeText() :string
    {
        $text='Welcome to news aggregator';

        return $text;
        
    }

    
}