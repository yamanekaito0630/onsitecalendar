<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserOnsite extends Model
{
    use HasFactory;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'user_onsite';

    /**
     * ユーザーテーブルとのリレーション
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 現場テーブルとのリレーション
     *
     * @return BelongsTo
     */
    public function onsite(): BelongsTo
    {
        return $this->belongsTo(Onsite::class);
    }
}
