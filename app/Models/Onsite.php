<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Onsite extends Model
{
    use HasFactory;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'onsites';

    /**
     * ユーザー現場テーブルとのリレーション
     *
     * @return HasMany
     */
    public function userOnsites(): HasMany
    {
        return $this->hasMany(UserOnsite::class);
    }

    /**
     * グループテーブルとのリレーション
     *
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
