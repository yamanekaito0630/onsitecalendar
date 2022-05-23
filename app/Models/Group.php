<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * グループユーザーテーブルとのリレーション
     *
     * @return HasMany
     */
    public function groupUsers(): HasMany
    {
        return $this->hasMany(GroupUser::class);
    }

    /**
     * 現場テーブルとのリレーション
     *
     * @return HasMany
     */
    public function onsite(): HasMany
    {
        return $this->hasMany(Onsite::class);
    }

    /**
     * 日当テーブルとのリレーション
     *
     * @return HasMany
     */
    public function dailyAllowance(): HasMany
    {
        return $this->hasMany(dailyAllowance::class);
    }
}
