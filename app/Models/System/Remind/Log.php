<?php

namespace App\Models\System\Remind;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Log.
 *
 * @package namespace App\Models\System\Remind;
 */
class Log extends Model
{
    protected $table = 'system_remind_log';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'message', 'operator', 'send', 'send_at', 'code', 'send_msg', 'send_code'
    ];
}
