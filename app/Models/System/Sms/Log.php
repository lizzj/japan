<?php

namespace App\Models\System\Sms;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Log.
 *
 * @package namespace App\Models\System\Sms;
 */
class Log extends Model
{
    protected $table = 'system_sms_log';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'phone', 'template_id', 'type', 'content', 'verify', 'send_at', 'send_code', 'send_msg', 'operator', 'modules'
    ];
    protected $attributes = [
        'verify' => 'no'
    ];
    protected $casts = [
        'content' => 'array',
    ];
}
