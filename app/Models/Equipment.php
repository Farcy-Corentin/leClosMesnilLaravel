<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property string $id
 * @property string $name
 * @property string $equipement_category_id
 * @property int $number
 * @property boolean $is_outside
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';

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
        static::creating(function ($equipment) {
            $equipment->id = (string) Str::uuid();
        });
    }

    public function equipmentCategory(): BelongsTo
    {
        return $this->belongsTo(EquipmentCategory::class, 'equipment_category_id');
    }
}
