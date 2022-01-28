<?php

namespace App\Models\Auth\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Level.
 *
 * @package namespace App\Models\Auth\User;
 */
class Level extends Model
{
    use SoftDeletes;

    protected $table = 'auth_user_level';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'weight', 'icon', 'count', 'status', 'default', 'description'
    ];
    protected $attributes = [
        'count' => 0,
        'status' => 'on',
        'default' => 'no',
        'icon' => '/Default/Level/level.png'
    ];

}
