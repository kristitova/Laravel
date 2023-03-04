<?php

namespace App\Jobs;

use App\Services\Contracts\Parser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\News;

class JobNewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $link;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $link, News $news)
    {
        $this->link = $link;
        $this->news = $news;
    }

     /**
     * Execute the job.
     *
     * @param Parser $parser
     * @return void
     */
    public function handle(Parser $parser): Parser
    {
        $parser->setLink($this->link)
            ->saveParseData($this->news);

        return $parser;
    }
}
