<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait CategoriesTrait
{
    public function getCategories(int $id=null) :array
    {
        $categories=[];
        $quantityCategories=5;

        if ($id===null) {
            for($i=1; $i<=$quantityCategories; $i++) {
                $categories[$i]=[
                    'category_id'=>$i,
                    'caption'=>\fake()->text(15),
                ];
            }
            return $categories;
        }
        
        return [
            'category_id'=>$id,
            'caption'=>\fake()->text(15),
        ];
    }
}