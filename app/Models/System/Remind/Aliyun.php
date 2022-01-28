<?php

namespace App\Models\System\Remind;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Remind.
 *
 * @package namespace App\Models\System\Remind;
 */
class Aliyun extends Model
{
    protected $table = 'system_remind_aliyun';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'url', 'secret', 'status'
    ];

}
