<?php

namespace App\Models\System\Sms;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Remind.
 *
 * @package namespace App\Models\System\Sms;
 */
class Aliyun extends Model
{
    protected $table = 'system_sms_aliyun';
    public $timestamps = true;
    protected $dateFormat = 'U';
    protected $fillable = [
        'key','secret','url','status'
    ];

}
