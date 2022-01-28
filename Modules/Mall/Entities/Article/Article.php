<?php

namespace Modules\Mall\Entities\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = 'mall_article_article';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'category_id', 'name', 'image', 'short_description', 'keywords', 'content', 'status', 'sort', 'click', 'default'
    ];
    protected $attributes = [
        'default' => 'no',
        'status' => 'on',
        'click' => 0,
        'sort' => 0
    ];
    protected $casts = [
        'keywords' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
