<?php

namespace App\Models;

use App\Traits\CustomSoftDelete;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * class Office
 * @mixin Eloquent
 * @package App\Models
 * @function static findOrFail(int $id)
 * @method static findorFail(int $id)
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
     * オフィスの登録処理
     * @param array<string, string|int> $inputData
     * @return void
     */
    public function registerOffice(array $inputData): void
    {
        $this->fill($inputData)->save();
    }

    /**
     * オフィスの更新処理
     * @param int $id
     * @param array<string, string|int> $inputData
     * @return void
     */
    public static function updateOffice(int $id, array $inputData): void
    {
        // 必要ない?
        DB::transaction(function () use ($id, $inputData) {
            Office::findorFail($id)->fill($inputData)->save();
        });
    }
}
