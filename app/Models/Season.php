<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property DateTime $started_at
 * @property DateTime $finished_at
 * @property int $price
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Season extends Model
{
    use HasFactory;

    protected $table = 'seasons';
}
