<?php

namespace App\Models\System\Sms;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Config.
 *
 * @package namespace App\Models\System\Sms;
 */
class Config extends Model
{
    protected $table = 'system_sms_config';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'default', 'throttle', 'threshold', 'verify'
    ];

}
