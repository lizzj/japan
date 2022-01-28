<?php

namespace Modules\Mall\Entities\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Config extends Model
{
    protected $table = 'mall_system_config';
    public $timestamps = true;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'logo', 'company', 'description', 'service_phone', 'service_qrcode', 'service_time'
    ];
}
