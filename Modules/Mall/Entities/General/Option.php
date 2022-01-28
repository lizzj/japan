<?php

namespace Modules\Mall\Entities\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class Option extends Model
{
    use SoftDeletes;

    protected $table = 'mall_general_option';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'belong', 'key', 'name', 'status', 'relate'
    ];
    protected $attributes = [
        'status' => 'on'
    ];

    public function getNameAttribute($value)
    {
        return Lang::get('mall::General/Option.' . $value);
    }

}
