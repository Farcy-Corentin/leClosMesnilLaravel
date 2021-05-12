<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property $id
 * @property string $name
 * @property string $slug
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

}