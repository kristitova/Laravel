<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resources extends Model
{
    use HasFactory;

    protected $table = 'resources';

    protected $fillable=[
        'caption' ,
        'category_id'
    ];

    public function resources(): HasMany
    {
      return $this->hasMany('App\Models\Categories');
    }

}
