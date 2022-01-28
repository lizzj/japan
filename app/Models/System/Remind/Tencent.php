<?php

namespace App\Models\System\Remind;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Tencent.
 *
 * @package namespace App\Models\System\Remind;
 */
class Tencent extends Model
{
    protected $table = 'system_remind_tencent';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'url', 'secret', 'status'
    ];
}
