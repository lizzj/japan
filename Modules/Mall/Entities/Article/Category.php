<?php

namespace Modules\Mall\Entities\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'mall_article_category';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'show', 'status', 'count', 'default', 'sort'
    ];
    protected $attributes = [
        'default' => 'no',
        'show' => 'on',
        'status' => 'on',
        'count' => 0
    ];
}
