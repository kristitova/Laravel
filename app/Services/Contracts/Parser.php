<?php
declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\News;


interface Parser
{
    public function setLink(string $link): self;
    public function saveParseData(News $news): void;
}