<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\News;

class NewsController extends Controller
{
    use NewsTrait;
    
    public function index($category_id): View
    {
        
        $news=News::query()->paginate(10);
        /*$categoriesNews=[
            1 => [1,2],
            2 => [3,4],
            3 => [5,6],
            4 => [7,8],
            5 => [9,10]
        ];
        for($i=0; $i<=count(array_keys($categoriesNews))-1; $i++) {
           if((int)$category_id===array_keys($categoriesNews)[$i]) {
                
              return \view('news.index', [
                  'news' => $this->getNews($id=null,$categoryNews=$categoriesNews[array_keys($categoriesNews)[$i]])
                ]);
           }
        }
        */
        return \view('news.index', [
            'news' => $news
          ]);
    
    }

    public function show(int $id): View
    {
        return \view('news.show', [
            'news' =>$this->getNews($id, $categoryNews=[])
        ]);
    }

}
