<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait NewsTrait
{
    public function getNews(int $id=null, array $categoryNews=[]) :array
    {
        $news=[];
        

        if ($id===null && count($categoryNews)!==0) {
            for($i=1; $i<=count($categoryNews); $i++) {
                $news[$i]=[
                    'id'=>$i,
                    'title'=>\fake()->jobTitle(),
                    'description'=>\fake()->text(100),
                    'author'=>\fake()->username(),
                    'created_at'=>now()->format('d-m-Y H:m')
                ];
            }
            return $news;
        } 

         return [
            'id'=>$id,
            'title'=>\fake()->jobTitle(),
            'description'=>\fake()->text(100),
            'author'=>\fake()->username(),
            'created_at'=>now()->format('d-m-Y H:m')
        ];
        
    }

 
}