<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable=[
        'title' ,
        'description'
    ];


    protected $casts = [
        'news_id' => 'array',
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'category_has_news',
            'news_id', 'category_id', 'id', 'id');
    }

    public function resources(): BelongsTo
    {
      return $this->belongsTo('App\Models\Resources');
    }
}
