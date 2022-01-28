<?php

namespace App\Models\Auth\User;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use SoftDeletes;

    public const UPDATED_AT = null;
    public $timestamps = true;
    protected $table = 'auth_user_user';
    protected $dateFormat = 'U';
    protected $fillable = [
        'account', 'avatar', 'nickname', 'name', 'phone', 'original', 'password', 'remember_token', 'level_id', 'pid', 'token', 'last_login',
        'balance', 'commission', 'expense', 'recharge', 'openid', 'unionid', 'sex',
        'status', 'is_active'
    ];
    protected $attributes = [
        'avatar' => '/Default/Avatar/default.jpg',
        'balance' => 0,
        'expense' => 0,
        'recharge' => 0,
        'commission' => 0,
        'level_id' => 1,
        'status' => 'on',
        'is_active' => 0
    ];
    protected $hidden = [
        'password', 'remember_token', 'original'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function parent()
    {
        return $this->hasOne(get_class($this), $this->getKeyName(), 'pid');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return ['roles' => 'client'];
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getLevel()
    {
        return $this->level_id;
    }
}
