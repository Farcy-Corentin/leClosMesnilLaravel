<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $icon
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class EquipmentCategory extends Model
{

    use HasFactory;

    protected $table = 'equipment_category';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($equipment_category) {
            $equipment_category->id = (string) Str::uuid();
        });
    }

    public function equipment(): HasMany
    {
        return $this->hasMany(Equipment::class, 'equipment_category_id');
    }
}
