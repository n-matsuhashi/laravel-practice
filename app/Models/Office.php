<?php

namespace App\Models;

use App\Traits\CustomSoftDelete;
use Eloquent;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ValidatedInput;

/**
 * class Office
 * @mixin Eloquent
 * @package App\Models
 */
class Office extends Model
{
    use HasFactory;
    use CustomSoftDelete;

    protected $fillable = [
        'name',
        'address',
        'post_code',
        'stair',
        'comment',
    ];

    /**
     * メモテーブルとのリレーション
     * @return HasMany
     */
    public function memos(): HasMany
    {
        return $this->hasMany(Memo::class);
    }


    /**
     * オフィスの登録処理
     * @param array<string, string|int>|ValidatedInput $inputData
     * @return void
     */
    public static function registerOffice($inputData):void
    {
        self::create($inputData instanceOf ValidatedInput ? $inputData->toArray() : $inputData);
    }

    /**
     * オフィスの更新処理
     * @param Office $office
     * @param array<string, string|int>|ValidatedInput $inputData
     * @return void
     */
    public static function updateOffice(Office $office, $inputData): void
    {
        // 必要ない?
        DB::transaction(function () use ($office, $inputData) {
            $office->fill(
                $inputData instanceOf ValidatedInput ? $inputData->toArray() : $inputData
            )->save();
        });
    }
}
