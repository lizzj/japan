<?php

namespace Modules\Mall\Entities\Member\Asset;

use App\Models\Auth\User\User;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'mall_member_asset_balance';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'user_id', 'source', 'before', 'num', 'after', 'relate', 'relate_id', 'content', 'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
