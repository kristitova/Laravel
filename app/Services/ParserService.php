<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\News;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): self 
    {
        $this->link = $link; 

        return $this;
    }

    public function saveParseData(News $news): void
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,author,description,pubDate]'
            ], 
            'news_database' => [
                'uses' => 'channel.item[title,author,description]'
            ],

        ]);

        $e = \explode("/", $this->link);
        $fileName = end($e);

        $jsonEncode = json_encode($data);
        $validated=$data['news_database']->validated();
        $news = $news->fill($validated);
        $news->save();

        Storage::append('news/' . $fileName, $jsonEncode);

   
    }
    
}