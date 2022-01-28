<?php

namespace Modules\Mall\Entities\Goods;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use  SoftDeletes;

    protected $table = 'mall_goods_category';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'pid', 'sort', 'status', 'icon', 'count'
    ];
    protected $attributes = [
        'count' => 0,
        'sort' => 0,
        'status' => 'on'
    ];

    public function children()
    {
        return $this->hasMany(get_class($this), 'pid', $this->getKeyName())->orderBy('sort', 'desc')->orderBy('id', 'asc');
    }
}
