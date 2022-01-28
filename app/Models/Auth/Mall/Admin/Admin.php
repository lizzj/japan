<?php

namespace App\Models\Auth\Mall\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
    use SoftDeletes;

    protected $table = 'auth_mall_admin_admin';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'account', 'avatar', 'original', 'password', 'remember_token', 'roles_id', 'last_login', 'status', 'nickname', 'openid', 'uuid', 'sex', 'introduction', 'email', 'phone'
    ];
    protected $attributes = [
        'avatar' => '/Default/Avatar/4.jpg',
        'status' => 'on'
    ];
    protected $hidden = [
        'password', 'original', 'remember_token'
    ];

    public function roles()
    {
        return $this->belongsTo(Roles::class)->withTrashed();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();// TODO: Implement getJWTIdentifier() method.
    }

    public function getJWTCustomClaims()
    {
        return [
            'modules' => 'mall',
            'roles' => 'admin'
        ];// TODO: Implement getJWTCustomClaims() method.
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
