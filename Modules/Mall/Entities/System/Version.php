<?php

namespace Modules\Mall\Entities\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Version extends Model
{
    use SoftDeletes;

    protected $table = 'mall_system_version';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'version', 'log', 'platform', 'force', 'url', 'status', 'release'
    ];
    protected $attributes = [
        'status' => 'on',
        'release' => 'no',
        'force' => 'no'
    ];
    protected $casts = [
        'log' => 'array',
    ];
}
