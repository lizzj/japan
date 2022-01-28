<?php

namespace App\Models\Auth\Mall\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Roles.
 *
 * @package namespace App\Models\Auth\Mall\Admin;
 */
class Roles extends Model
{
    use SoftDeletes;
    

    protected $table = 'auth_mall_admin_roles';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'code', 'status', 'count'
    ];
    protected $attributes = [
        'status' => 'on',
        'count' => 0
    ];
}
