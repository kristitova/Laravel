<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use Illuminate\Http\Request;
use App\Services\Contracts\Parser;
use Illuminate\Http\Response;
use App\QueryBuilders\ResourcesQueryBuilder;
use App\Models\News;



class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ResourcesQueryBuilder $resourcesQueryBuilder
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser, ResourcesQueryBuilder $resourcesQueryBuilder, News $news)
    {
        
        
        $urls=$resourcesQueryBuilder->getAll()->pluck('caption')->all();
        foreach ($urls as $url) {
            \dispatch(new JobNewsParsing($url, $news));
            
         }

 
         return "Parsing completed";
    }
}
