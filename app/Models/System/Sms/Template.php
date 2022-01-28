<?php

namespace App\Models\System\Sms;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Template.
 *
 * @package namespace App\Models\System\Sms;
 */
class Template extends Model
{
    protected $table = 'system_sms_template';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'belong', 'code', 'name', 'template_no', 'template_sign', 'param'
    ];
}
