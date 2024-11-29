<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * 入力された認証情報が正しいかどうかを判定
     * @param array<string, string> $credentials
     * @return bool
     */
    public static function isCredentialsValid(array $credentials): bool {
        // メールアドレスが一致するユーザーを取得
        $match_user = User::where('email', $credentials['email'])->first() ?? null;
        // パスワードの検証
        if ($match_user && password_verify($credentials['password'], $match_user->password)) {
            return true;
        }
        return false;
    }

}
