<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
