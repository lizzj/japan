<?php

namespace App\Models\System\Remind;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Config.
 *
 * @package namespace App\Models\System\Remind;
 */
class Config extends Model
{
    protected $table = 'system_remind_config';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'frequency', 'default', 'status', 'week', 'hour', 'next_at'
    ];
    /**
     * frequency 通知频率  default 默认通知的软件 week通知的时间,通知状态
     */
    protected $casts = [
        'hour' => 'array',
        'week' => 'array'
    ];
}
