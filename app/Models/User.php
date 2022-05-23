<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * メモテーブルとのリレーション
     *
     * @return HasMany
     */
    public function memo(): HasMany
    {
        return $this->hasMany(Memo::class);
    }

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
        return $this->hasMany(UserOnsite::class);
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
